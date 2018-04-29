<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string ('description', 1000);
            $table->string('city', 45);
            $table->string('address', 100);
            $table->string('postal_code', 10);
            $table->string('cuisine_style', 100);
            $table->string('popular_menu', 200);
            $table->time('operation_from');
            $table->time('operation_to');
            $table->string('logo', 150);
            $table->tinyInteger('is_active')->unsigned()->default(1);
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
        Schema::dropIfExists('restaurants');
    }
}
