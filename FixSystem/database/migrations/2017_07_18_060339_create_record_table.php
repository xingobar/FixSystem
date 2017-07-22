<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->text('description');
            $table->string('location');
            $table->unsignedInteger('customer_phone');
            $table->boolean('finish')->default(false);
            $table->dateTime('finished_time')->nullable();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('unit_id')->index();
            $table->unsignedInteger('product_id')->index();
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
        Schema::dropIfExists('record');
    }
}
