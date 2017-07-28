<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeToRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('record', function (Blueprint $table) {
            $table->dateTime('work_hour')->nullable();
            $table->dateTime('traffic_hour')->nullable();
            $table->dateTime('work_start')->nullable();
            $table->dateTime('work_end')->nullable();
            $table->dateTime('departure_time')->nullable();
            $table->dateTime('arrival_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('record', function (Blueprint $table) {
            $table->dropColumn('work_hour');
            $table->dropColumn('traffic_hour');
            $table->dropColumn('work_start');
            $table->dropColumn('work_end');
            $table->dropColumn('departure_time');
            $table->dropColumn('arrival_time');
        });
    }
}
