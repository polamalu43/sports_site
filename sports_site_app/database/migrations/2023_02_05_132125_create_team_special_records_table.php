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
        Schema::connection('pgsql_nfl')->create('team_special_records', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id');
            $table->integer('return_yards');
            $table->integer('punts');
            $table->integer('punt_yards');
            $table->float('punt_average');
            $table->integer('opponent_return_yards');
            $table->integer('opponent_punts');
            $table->integer('opponent_punt_yards');
            $table->float('opponent_punt_average');
            $table->integer('kickoffs');
            $table->integer('kickoffs_in_end_zone');
            $table->integer('kickoff_touchbacks');
            $table->integer('punts_had_blocked');
            $table->float('punt_net_average');
            $table->integer('extra_point_kicking_attempts');
            $table->integer('extra_point_kicking_conversions');
            $table->integer('extra_points_had_blocked');
            $table->integer('extra_point_passing_attempts');
            $table->integer('extra_point_passing_conversions');
            $table->integer('extra_point_rushing_attempts');
            $table->integer('extra_point_rushing_conversions');
            $table->integer('field_goal_attempts');
            $table->integer('field_goals_made');
            $table->integer('field_goals_had_blocked');
            $table->integer('punt_returns');
            $table->integer('punt_return_yards');
            $table->integer('kick_returns');
            $table->integer('kick_return_yards');
            $table->integer('opponent_kickoffs');
            $table->integer('opponent_kickoffs_in_end_zone');
            $table->integer('opponent_kickoff_touchbacks');
            $table->integer('opponent_punts_had_blocked');
            $table->float('opponent_punt_net_average');
            $table->integer('opponent_extra_point_kicking_attempts');
            $table->integer('opponent_extra_point_kicking_conversions');
            $table->integer('opponent_extra_points_had_blocked');
            $table->integer('opponent_extra_point_passing_attempts');
            $table->integer('opponent_extra_point_passing_conversions');
            $table->integer('opponent_extra_point_rushing_attempts');
            $table->integer('opponent_extra_point_rushing_conversions');
            $table->integer('opponent_field_goal_attempts');
            $table->integer('opponent_field_goals_made');
            $table->integer('opponent_field_goals_had_blocked');
            $table->integer('opponent_punt_returns');
            $table->integer('opponent_punt_return_yards');
            $table->integer('opponent_kick_returns');
            $table->integer('opponent_kick_return_yards');
            $table->integer('opponent_interception_returns');
            $table->integer('opponent_interception_return_yards');
            $table->integer('blocked_kicks');
            $table->integer('punt_return_touchdowns');
            $table->integer('punt_return_long');
            $table->integer('kick_return_touchdowns');
            $table->integer('kick_return_long');
            $table->integer('blocked_kick_return_yards');
            $table->integer('blocked_kick_return_touchdowns');
            $table->integer('field_goal_return_yards');
            $table->integer('field_goal_return_touchdowns');
            $table->integer('punt_net_yards');
            $table->integer('opponent_blocked_kicks');
            $table->integer('opponent_punt_return_touchdowns');
            $table->integer('opponent_punt_return_long');
            $table->integer('opponent_kick_return_touchdowns');
            $table->integer('opponent_kick_return_long');
            $table->integer('opponent_blocked_kick_return_yards');
            $table->integer('opponent_blocked_kick_return_touchdowns');
            $table->integer('opponent_field_goal_return_yards');
            $table->integer('opponent_field_goal_return_touchdowns');
            $table->integer('opponent_punt_net_yards');
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
        Schema::connection('pgsql_nfl')->dropIfExists('team_special_records');
    }
};
