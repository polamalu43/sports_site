<?php

namespace App\Services\Nfl;

use App\Repositories\Nfl\IStandingRepository;

class StandingService
{
  protected object $standing_repository;

  public function __construct(IStandingRepository $standing_repository)
  {
    $this->standing_repository = $standing_repository;
  }

  public function getSelectStandingData()
  {
    return [
      'division' => $this->standing_repository->getDivisionData(),
      'conference' => $this->standing_repository->getConferenceData(),
      'league' => $this->standing_repository->getLeagueData(),
    ];
  }
}

?>
