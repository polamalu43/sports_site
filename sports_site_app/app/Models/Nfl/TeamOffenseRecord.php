<?php

namespace App\Models\Nfl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamOffenseRecord extends Model
{
    use HasFactory;

    protected $connection = 'pgsql_nfl';
    protected $table = 'team_offense_records';
}
