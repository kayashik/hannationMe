<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyNightPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('night_places', function ($table) {
            $table->integer('subcategory_id')->unsigned()->nullable();
        });

        Schema::table('night_places', function ($table) {
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('set null')->onUpdate('cascade');
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
         $table->dropForeign(['subcategory_id']);        
       });

        Schema::table('night_places', function ($table) {
         $table->dropColumn(['subcategory_id']);
       });

    }
}
