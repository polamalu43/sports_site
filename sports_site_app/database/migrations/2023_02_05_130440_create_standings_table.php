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
        Schema::connection('pgsql_nfl')->create('standings', function (Blueprint $table) {
            $table->id();
            $table->integer('season_type');
            $table->integer('season');
            $table->string('conference');
            $table->string('division');
            $table->string('team');
            $table->string('name');
            $table->integer('wins');
            $table->integer('losses');
            $table->integer('ties');
            $table->float('percentage');
            $table->integer('points_for');
            $table->integer('points_against');
            $table->integer('net_points');
            $table->integer('touchdowns');
            $table->integer('division_wins');
            $table->integer('division_losses');
            $table->integer('conference_wins');
            $table->integer('conference_losses');
            $table->integer('team_id');
            $table->integer('division_ties');
            $table->integer('conference_ties');
            $table->integer('global_team_id');
            $table->integer('division_rank');
            $table->integer('conference_rank');
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
        Schema::connection('pgsql_nfl')->dropIfExists('standings');
    }
};
