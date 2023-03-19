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
        Schema::connection('pgsql_nfl')->create('team_diffense_records', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id');
            $table->integer('opponent_score');
            $table->integer('quarterback_hits');
            $table->integer('tackles_for_loss');
            $table->integer('safeties');
            $table->integer('opponent_score_quarter1');
            $table->integer('opponent_score_quarter2');
            $table->integer('opponent_score_quarter3');
            $table->integer('opponent_score_quarter4');
            $table->integer('opponent_score_overtime');
            $table->string('opponent_time_of_possession');
            $table->integer('opponent_first_downs');
            $table->integer('opponent_first_downs_by_rushing');
            $table->integer('opponent_first_downs_by_passing');
            $table->integer('opponent_first_downs_by_penalty');
            $table->integer('opponent_offensive_plays');
            $table->integer('opponent_offensive_yards');
            $table->float('opponent_offensive_yards_per_play');
            $table->integer('opponent_touchdowns');
            $table->integer('opponent_rushing_attempts');
            $table->integer('opponent_rushing_yards');
            $table->float('opponent_rushing_yards_per_attempt');
            $table->integer('opponent_rushing_touchdowns');
            $table->integer('opponent_passing_attempts');
            $table->integer('opponent_passing_completions');
            $table->integer('opponent_passing_yards');
            $table->integer('opponent_passing_touchdowns');
            $table->integer('opponent_passing_interceptions');
            $table->float('opponent_passing_yards_per_attempt');
            $table->float('opponent_passing_yards_per_completion');
            $table->float('opponent_completion_percentage');
            $table->float('opponent_passer_rating');
            $table->integer('opponent_third_down_attempts');
            $table->integer('opponent_third_down_conversions');
            $table->float('opponent_third_down_percentage');
            $table->integer('opponent_fourth_down_attempts');
            $table->integer('opponent_fourth_down_conversions');
            $table->float('opponent_fourth_down_percentage');
            $table->integer('opponent_red_zone_attempts');
            $table->integer('opponent_red_zone_conversions');
            $table->integer('opponent_goal_to_go_attempts');
            $table->integer('opponent_goal_to_go_conversions');
            $table->integer('opponent_fumbles');
            $table->integer('opponent_fumbles_lost');
            $table->integer('opponent_times_sacked');
            $table->integer('opponent_times_sacked_yards');
            $table->integer('opponent_quarterback_hits');
            $table->integer('opponent_tackles_for_loss');
            $table->integer('opponent_safeties');
            $table->integer('interception_returns');
            $table->integer('interception_return_yards');
            $table->integer('solo_tackles');
            $table->integer('assisted_tackles');
            $table->integer('sacks');
            $table->integer('sack_yards');
            $table->integer('fumble_return_yards');
            $table->integer('fumble_return_touchdowns');
            $table->integer('interception_return_touchdowns');
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
        Schema::connection('pgsql_nfl')->dropIfExists('team_diffense_records');
    }
};
