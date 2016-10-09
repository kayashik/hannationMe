<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('imgURL')-> before('slug');
            $table->string('address');
            $table->string('shortDescription');
            $table->text('description');
            $table->string('fitures');
            $table->time('open');
            $table->time('closed');
            $table->float('averagePrice', 4, 2);
            $table->string('cathegory');
            $table->string('subCathegory');

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
        Schema::dropIfExists('places');
    }
}
