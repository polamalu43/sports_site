<?php

namespace App\Libraries\Debug;
use Illuminate\Support\Facades\DB;

class SqlDebug
{
    public static function checkQueryLog($query): void
    {
      // dd($query);
      // DB::enableQueryLog();
      // dd($query);
      // dd(DB::getQueryLog());
    }
}
