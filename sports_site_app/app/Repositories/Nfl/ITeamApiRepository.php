<?php

namespace App\Repositories\Nfl;

interface ITeamApiRepository
{
  public function insertApiDataIntoStandings(array $records):void;
  public function insertApiDataIntoTeams(array $records):void;
  public function insertApiDataIntoTeamBasicRecords(array $records):void;
  public function insertApiDataIntoTeamOffenseRecords(array $records):void;
  public function insertApiDataIntoTeamDiffenseRecords(array $records):void;
  public function insertApiDataIntoTeamSpecialRecords(array $records):void;
  public function insertApiDataIntoStadiums(array $records):void;
}

?>
