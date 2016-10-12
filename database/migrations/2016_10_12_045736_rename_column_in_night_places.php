<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnInNightPlaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('night_places', function ($table) {
                $table->renameColumn('shortDescription', 'type');
        });

         Schema::table('night_places', function ($table) {
                $table->dropColumn('open');
                 $table->dropColumn('closed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('night_places', function ($table) {
                $table->renameColumn( 'type', 'shortDescription');
        });

        Schema::table('night_places', function ($table) {
                $table->time('open');
                $table->time('closed');
        });
    }
}
