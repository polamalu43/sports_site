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
        Schema::connection('pgsql_nfl')->create('stadiums', function (Blueprint $table) {
            $table->id();
            $table->integer('stadium_id');
            $table->string('name');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('capacity');
            $table->string('playing_surface');
            $table->float('geo_lat');
            $table->float('geo_long');
            $table->string('type');
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
        Schema::connection('pgsql_nfl')->dropIfExists('stadiums');
    }
};
