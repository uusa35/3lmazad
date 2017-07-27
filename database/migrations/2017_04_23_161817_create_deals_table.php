<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');
            // related to the plan
            $table->string('reference_id')->nullable();
            $table->decimal('price', 6, 3)->unsigned()->nullable(); // per day // final_price because sometimes he may make sale !!
            $table->integer('duration')->nullable(); // no of days from the plans table // later shall calculate the end date accordingly


            $table->decimal('total', 6, 3)->unsigned()->nullable(); // final * duration
            $table->boolean('valid')->default(1);

            $table->integer('plan_id')->unsigned()->index()->nullable();
            $table->foreign('plan_id')->references('id')->on('plans');

            $table->integer('ad_id')->unsigned()->index()->nullable();
            $table->foreign('ad_id')->references('id')->on('ads');

            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
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
        Schema::drop('deals');
    }
}
