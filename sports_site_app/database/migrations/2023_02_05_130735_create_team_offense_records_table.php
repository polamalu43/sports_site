<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql_nfl')->create('team_offense_records', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id');
            $table->integer('score');
            $table->integer('score_quarter1');
            $table->integer('score_quarter2');
            $table->integer('score_quarter3');
            $table->integer('score_quarter4');
            $table->integer('score_overtime');
            $table->string('time_of_possession');
            $table->integer('first_downs');
            $table->integer('first_downs_by_rushing');
            $table->integer('first_downs_by_passing');
            $table->integer('first_downs_by_penalty');
            $table->integer('offensive_plays');
            $table->integer('offensive_yards');
            $table->float ('offensive_yards_per_play');
            $table->integer('touchdowns');
            $table->integer('rushing_attempts');
            $table->integer('rushing_yards');
            $table->float ('rushing_yards_per_attempt');
            $table->integer('rushing_touchdowns');
            $table->integer('passing_attempts');
            $table->integer('passing_completions');
            $table->integer('passing_yards');
            $table->integer('passing_touchdowns');
            $table->integer('passing_interceptions');
            $table->float ('passing_yards_per_attempt');
            $table->float ('passing_yards_per_completion');
            $table->float ('completion_percentage');
            $table->float ('passer_rating');
            $table->integer('third_down_attempts');
            $table->integer('third_down_conversions');
            $table->float ('third_down_percentage');
            $table->integer('fourth_down_attempts');
            $table->integer('fourth_down_conversions');
            $table->float ('fourth_down_percentage');
            $table->integer('red_zone_attempts');
            $table->integer('red_zone_conversions');
            $table->integer('goal_to_go_attempts');
            $table->integer('goal_to_go_conversions');
            $table->integer('fumbles');
            $table->integer('fumbles_lost');
            $table->integer('times_sacked');
            $table->integer('times_sacked_yards');
            $table->integer('fumbles_forced');
            $table->integer('fumbles_recovered');
            $table->integer('opponent_solo_tackles');
            $table->integer('opponent_assisted_tackles');
            $table->integer('opponent_sacks');
            $table->integer('opponent_sack_yards');
            $table->integer('opponent_passes_defended');
            $table->integer('opponent_fumbles_forced');
            $table->integer('opponent_fumbles_recovered');
            $table->integer('opponent_fumble_return_yards');
            $table->integer('opponent_fumble_return_touchdowns');
            $table->integer('opponent_interception_return_touchdowns');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql_nfl')->dropIfExists('team_offense_records');
    }
};
