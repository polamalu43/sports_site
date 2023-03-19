<?php

namespace App\Services\Nfl;

use App\Repositories\Nfl\ITeamApiRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamApiService
{
  protected $team_api_repository;

  public function __construct(ITeamApiRepository $team_api_repository)
  {
      $this->team_api_repository = $team_api_repository;
  }

  public function insertApiResponse(): void
  {
    $standings = $this->getStandingsApiResponse();
    $teams = $this->getTeamsApiResponse()['teams'];
    $team_basic_records = $this->getTeamSeasonStatsApiResponse()['basic'];
    $team_offense_records = $this->getTeamSeasonStatsApiResponse()['offense'];
    $team_diffense_records = $this->getTeamSeasonStatsApiResponse()['diffense'];
    $team_special_records = $this->getTeamSeasonStatsApiResponse()['special'];
    $stadiums = $this->getTeamsApiResponse()['stadiums'];

    try {
      DB::beginTransaction();
      $this->team_api_repository->insertApiDataIntoStandings($standings);
      $this->team_api_repository->insertApiDataIntoTeams($teams);
      $this->team_api_repository->insertApiDataIntoTeamBasicRecords($team_basic_records);
      $this->team_api_repository->insertApiDataIntoTeamOffenseRecords($team_offense_records);
      $this->team_api_repository->insertApiDataIntoTeamDiffenseRecords($team_diffense_records);
      $this->team_api_repository->insertApiDataIntoTeamSpecialRecords($team_special_records);
      $this->team_api_repository->insertApiDataIntoStadiums($stadiums);
      DB::commit();
    } catch (Exception $e) {
      DB::rollBack();
    }
  }

  private function getStandingsApiResponse(): array
  {
    $url = app('ApiEndPointConsts')::STANDINGS;
    $product_api = app('ProductApiWithCurl');
    $column_names = app('ColumnNameConsts')::STANDINGS;

    $product_api->setUrl($url);
    $response = $this->formatResponseData($product_api->getResponseData(), $column_names);

    return $this->convertKeyNamesToSnakeCase($this->convertObjectToArray($response));
  }

  private function getTeamsApiResponse(): array
  {
    $url = app('ApiEndPointConsts')::TEAMS;
    $product_api = app('ProductApiWithCurl');
    $teams_column_names = app('ColumnNameConsts')::TEAMS;
    $stadiums_column_names = app('ColumnNameConsts')::STADIUMS;

    $product_api->setUrl($url);
    $response_data = $product_api->getResponseData();
    $teams = $this->formatResponseData($response_data, $teams_column_names);

    foreach ($response_data as $team) {
      $stadiums[] = $team->StadiumDetails;
    }

    return [
      'teams' => $this->convertKeyNamesToSnakeCase($this->convertObjectToArray($teams)),
      'stadiums' => $this->convertKeyNamesToSnakeCase($this->convertObjectToArray($stadiums))
    ];
  }

  private function getTeamSeasonStatsApiResponse(): array
  {
    $url = app('ApiEndPointConsts')::TEAM_SEASON_STATS;
    $product_api = app('ProductApiWithCurl');

    $product_api->setUrl($url);
    $response = $product_api->getResponseData();

    return $this->diviteTeamSeasonStatsApiResponse($response);
  }

  private function diviteTeamSeasonStatsApiResponse(array $response): array
  {
    $team_basic_records = $this->formatResponseData($response, app('ColumnNameConsts')::TEAM_BASIC_RECORDS);
    $team_offense_records = $this->formatResponseData($response, app('ColumnNameConsts')::TEAM_OFFENSE_RECORDS);
    $team_diffense_records = $this->formatResponseData($response, app('ColumnNameConsts')::TEAM_DIFFENSE_RECORDS);
    $team_special_records = $this->formatResponseData($response, app('ColumnNameConsts')::TEAM_SPECIAL_RECORDS);

    return [
      'basic' => $this->convertKeyNamesToSnakeCase($this->convertObjectToArray($team_basic_records)),
      'offense' => $this->convertKeyNamesToSnakeCase($this->convertObjectToArray($team_offense_records)),
      'diffense' => $this->convertKeyNamesToSnakeCase($this->convertObjectToArray($team_diffense_records)),
      'special' => $this->convertKeyNamesToSnakeCase($this->convertObjectToArray($team_special_records))
    ];
  }

  private function formatResponseData(array $response, array $column_names): array
  {
    $records = [];
    foreach ($response as $team_index => $team_data) {
      foreach ($column_names as $column_name) {
        $records[$team_index][$column_name] = $team_data->$column_name;
      }
    }

    return $records;
  }

  private function convertObjectToArray(object|array $object):array
  {
    $array = [];

    foreach ($object as $key => $value) {
      $array[$key] = (array)$value;
    }

    return $array;
  }

  private function convertKeyNamesToSnakeCase(array $teams):array
  {
    $new_teams = [];

    foreach ($teams as $team_index => $team) {
      foreach ($team as $camel_case => $value) {
        $snake_case = str_replace('_i_d', '_id', Str::snake($camel_case));
        $new_teams[$team_index][$snake_case] = $value;
      }
    }

    return $new_teams;
  }
}

?>
