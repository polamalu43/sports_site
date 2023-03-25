<?php

namespace App\Http\Controllers\Nfl\Users;

use App\Http\Controllers\Controller;
use App\Services\Nfl\StandingService;
use Illuminate\Http\Request;
use App\Repositories\Nfl\Impl\StandingRepository;

class StandingController extends Controller
{
  protected $standing_service;
  public function __construct(StandingService $standing_service)
  {
      $this->standing_service = $standing_service;
  }

  public function index()
  {
    $check = new StandingRepository;
    // dd($check->getDivisionData());
    // dd($this->standing_service->getSelectStandingData());

    return view('nfl.standing');
  }

  public function standings()
  {
    return $this->standing_service->getSelectStandingData();
  }
}

?>
