<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropNightPlaceAndRenameDatePlace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('day_places');
        Schema::rename('night_places', 'places');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::create('day_places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('imgURL');
            $table->string('videoURL');
            $table->string('type');
            $table->string('fitures');
            $table->text('description');
            $table->string('address');
            $table->string('work_hours');
            $table->float('everage_price', 4, 2)->nullable();
            $table->timestamps();
        });
        Schema::rename('places', 'night_places');
    }
}
