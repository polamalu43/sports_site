<?php

namespace App\Http\Controllers\Nfl\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
    //   $product_api = app('ProductApiWithCurl');
    //   $product_api->setUrl('https://api.sportsdata.io/v3/nfl/stats/json/PlayerSeasonStats/2022?key=d6579512099946b7be1d3055f6a1a9cf');
    //   $response = $product_api->getResponseData();

    //     dd($response);

        return view('nfl.index');
    }
}
