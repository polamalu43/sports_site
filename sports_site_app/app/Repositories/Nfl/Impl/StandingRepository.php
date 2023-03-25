<?php

namespace App\Repositories\Nfl\Impl;

use App\Repositories\Nfl\IStandingRepository;
use App\Models\Nfl\Standing;

class StandingRepository implements IStandingRepository
{
  private object $select_standing_data;

  public function __construct()
  {
      $this->select_standing_data = $this->getSelectStandingData();
  }

  public function getSelectStandingData(): object
  {
    return Standing::select(
        'id',
        'season_type',
        'season',
        'conference',
        'division',
        'team',
        'name',
        'wins',
        'losses',
        'ties',
        'percentage',
        'points_for',
        'points_against',
        'net_points',
        'touchdowns',
        'division_wins',
        'division_losses',
        'conference_wins',
        'conference_losses',
        'team_id',
        'division_ties',
        'conference_ties',
        'division_rank',
        'conference_rank',
      )
      ->get();
  }

  public function getDivisionData()
  {
    $groupedData = $this->select_standing_data->groupBy(['season', 'season_type', 'conference', 'division']);
    $sortedData = $groupedData->map(function ($item) {
      return $item->map(function ($item2) {
        return $item2->map(function ($item3) {
          return $item3->map(function ($item4) {
            return $item4->sortBy([
              ['division_rank', true]
            ])->values();
          });
        });
      });
    });
    return $sortedData->toArray();
  }

  public function getConferenceData()
  {
    $groupedData = $this->select_standing_data->groupBy(['season', 'season_type', 'conference']);
    $sortedData = $groupedData->map(function ($item) {
      return $item->map(function ($item2) {
        return $item2->map(function ($item3) {
          return $item3->sortBy([
            ['conference_rank', true]
          ])->values();
        });
      });
    });
    return $sortedData->toArray();
  }

  public function getLeagueData()
  {
    $groupedData = $this->select_standing_data->groupBy(['season', 'season_type']);
    $sortedData = $groupedData->map(function ($item) {
      return $item->map(function ($item2) {
        return $item2->sortBy([
          ['wins', false],
          ['net_points', false]
        ])->values();
      });
    });

    return $sortedData->toArray();
  }
}
?>
