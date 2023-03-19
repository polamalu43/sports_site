<?php

namespace App\Repositories\Nfl\Impl;

use App\Repositories\Nfl\ITeamApiRepository;
use App\Models\Nfl\Standing;
use App\Models\Nfl\Team;
use App\Models\Nfl\TeamBasicRecord;
use App\Models\Nfl\TeamOffenseRecord;
use App\Models\Nfl\TeamDiffenseRecord;
use App\Models\Nfl\TeamSpecialRecord;
use App\Models\Nfl\Stadium;

class TeamApiRepository implements ITeamApiRepository
{
  public function insertApiDataIntoStandings(array $records):void
  {
    Standing::insert($records);
  }

  public function insertApiDataIntoTeams(array $records):void
  {
    Team::insert($records);
  }

  public function insertApiDataIntoTeamBasicRecords(array $records):void
  {
    TeamBasicRecord::insert($records);
  }

  public function insertApiDataIntoTeamOffenseRecords(array $records):void
  {
    TeamOffenseRecord::insert($records);
  }

  public function insertApiDataIntoTeamDiffenseRecords(array $records):void
  {
    TeamDiffenseRecord::insert($records);
  }

  public function insertApiDataIntoTeamSpecialRecords(array $records):void
  {
    TeamSpecialRecord::insert($records);
  }

  public function insertApiDataIntoStadiums(array $records):void
  {
    Stadium::insert($records);
  }
}
?>
