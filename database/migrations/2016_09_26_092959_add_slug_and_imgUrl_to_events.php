<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugAndImgUrlToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('slug', 'imgURL')) {
            Schema::table('events', function ($table) {
                $table->string('slug')->unique()->after('eventDateTime');
                $table->string('imgURL')-> before('slug');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function ($table) {
            $table->dropColumn('slug');
            $table->dropColumn('imgURL');
        });
    }
}
