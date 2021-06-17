<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
        	$table->increments('id');
        	$table->integer('city_id')->nullable();
        	$table->date('dateStart')->nullable();
        	$table->date('dateFinish')->nullable();
        	$table->integer('price')->nullable();
        	$table->integer('hotel_id')->nullable();
        	$table->integer('num_people')->nullable();
        	$table->text('describe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
