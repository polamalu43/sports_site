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
    return $this->select_standing_data->groupBy(['season', 'season_type', 'division'])->toArray();
  }

  public function getConferenceData()
  {
    return $this->select_standing_data->groupBy(['season', 'season_type', 'conference'])->toArray();
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
