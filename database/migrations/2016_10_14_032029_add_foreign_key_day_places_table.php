<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyDayPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_places', function ($table) {
            $table->integer('subcategory_id')->unsigned()->nullable();
        });

        Schema::table('day_places', function ($table) {
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
        Schema::table('day_places', function ($table) {
         $table->dropForeign(['subcategory_id']);  
        }); 

        Schema::table('day_places', function ($table) {
         $table->dropColumn(['subcategory_id']);
        });
  
    }
}
