<?php

namespace App\Http\Controllers\Nfl\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Nfl\TeamApiService;
use App\Repositories\Nfl\ITeamApiRepository;

class TeamController extends Controller
{
    public function insertApiResponse(TeamApiService $team_service)
    {
        $team_service->insertApiResponse();
    }
}
