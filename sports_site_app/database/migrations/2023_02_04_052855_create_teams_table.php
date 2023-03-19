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
        Schema::connection('pgsql_nfl')->create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->integer('team_id');
            $table->integer('player_id');
            $table->string('city');
            $table->string('name');
            $table->string('conference');
            $table->string('division');
            $table->string('full_name');
            $table->integer('stadium_id');
            $table->integer('bye_week');
            $table->float('average_draft_position')->nullable();
            $table->float('average_draft_position_p_p_r')->nullable();
            $table->string('head_coach')->nullable();
            $table->string('offensive_coordinator')->nullable();
            $table->string('defensive_coordinator')->nullable();
            $table->string('special_teams_coach')->nullable();
            $table->string('offensive_scheme')->nullable();
            $table->string('defensive_scheme')->nullable();
            $table->string('upcoming_salary')->nullable();
            $table->string('upcoming_opponent')->nullable();
            $table->integer('upcoming_opponent_rank')->nullable();
            $table->integer('upcoming_opponent_position_rank')->nullable();
            $table->string('upcoming_fan_duel_salary')->nullable();
            $table->string('upcoming_draft_kings_salary')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('tertiary_color')->nullable();
            $table->string('quaternary_color')->nullable();
            $table->string('wikipedia_logo_url')->nullable();
            $table->string('wikipedia_word_mark_url')->nullable();
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
        Schema::connection('pgsql_nfl')->dropIfExists('teams');
    }
};
