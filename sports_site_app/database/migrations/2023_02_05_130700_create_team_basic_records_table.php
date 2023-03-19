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
        Schema::connection('pgsql_nfl')->create('team_basic_records', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id');
            $table->integer('season_type');
            $table->integer('season');
            $table->string('team');
            $table->integer('total_score');
            $table->integer('temperature');
            $table->integer('humidity');
            $table->integer('wind_speed');
            $table->float('over_under');
            $table->float('point_spread');
            $table->integer('penalties');
            $table->integer('penalty_yards');
            $table->integer('giveaways');
            $table->integer('takeaways');
            $table->integer('turnover_differential');
            $table->integer('opponent_penalties');
            $table->integer('opponent_penalty_yards');
            $table->integer('opponent_giveaways');
            $table->integer('opponent_takeaways');
            $table->integer('opponent_turnover_differential');
            $table->float('red_zone_percentage');
            $table->float('goal_to_go_percentage');
            $table->integer('quarterback_hits_differential');
            $table->integer('tackles_for_loss_differential');
            $table->integer('quarterback_sacks_differential');
            $table->float('tackles_for_loss_percentage');
            $table->float('quarterback_hits_percentage');
            $table->float('times_sacked_percentage');
            $table->float('opponent_red_zone_percentage');
            $table->float('opponent_goal_to_go_percentage');
            $table->integer('opponent_quarterback_hits_differential');
            $table->integer('opponent_tackles_for_loss_differential');
            $table->integer('opponent_quarterback_sacks_differential');
            $table->float('opponent_tackles_for_loss_percentage');
            $table->float('opponent_quarterback_hits_percentage');
            $table->float('opponent_times_sacked_percentage');
            $table->integer('passes_defended');
            $table->string('team_name');
            $table->integer('games');
            $table->integer('passing_dropbacks');
            $table->integer('opponent_passing_dropbacks');
            $table->integer('team_season_id');
            $table->integer('two_point_conversion_returns');
            $table->integer('opponent_two_point_conversion_returns');
            $table->integer('global_team_id');
            $table->integer('team_stat_id');
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
        Schema::connection('pgsql_nfl')->dropIfExists('team_basic_records');
    }
};
