<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('description')->nullable();
            $table->string('mobile')->nullable();
            $table->string('manufacturing_year')->nullable();
            $table->string('mileage')->nullable();
            $table->string('room_no')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('bathroom_no')->nullable();
            $table->enum('rent_type', ['monthly', 'weekly', 'daily', 'yearly'])->nullable();
            $table->string('building_age')->nullable();
            $table->string('space')->nullable();
            $table->text('address')->nullable();
            $table->boolean('is_new')->default(0)->nullable();
            $table->boolean('is_automatic')->default(1)->nullable();
            $table->boolean('is_furnished')->nullable();

            $table->integer('ad_id')->unsigned()->index()->nullable();
            $table->foreign('ad_id')->references('id')->on('ads');

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
        Schema::drop('ad_metas');
    }
}
