<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColomnToNightPlaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('night_places', function ($table) {
            $table->string('work_hours')->after('fitures');
            $table->string('videoURL')->after('imgURL');
            $table->float('everage_price', 4, 2)->nullable()->after('work_hours');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('work_hours');
            $table->dropColumn('everage_price');
            $table->dropColumn('videoURL');
});
    }
}
