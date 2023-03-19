<?php

namespace App\Http\Controllers\Nfl\Api;

use App\Http\Controllers\Controller;
use App\Services\Nfl\StandingService;
use Illuminate\Http\Request;

class StandingController extends Controller
{
  protected $standing_service;
  public function __construct(StandingService $standing_service)
  {
      $this->standing_service = $standing_service;
  }

  public function standings()
  {
    // $test = [
    //   'division' => $this->standing_service->getDivisionData(),
    //   'conference' => $this->standing_service->getConferenceData(),
    //   'league' => $this->standing_service->getLeagueData(),
    // ];

    // dd(1111);

    return [
      'division' => $this->standing_service->getDivisionData(),
      'conference' => $this->standing_service->getConferenceData(),
      'league' => $this->standing_service->getLeagueData(),
    ];
  }
}

?>
