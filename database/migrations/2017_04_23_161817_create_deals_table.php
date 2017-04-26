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
            $table->decimal('final_price',6,2)->unsigned()->nullable(); // per day
            $table->integer('duration')->nullable(); // no of days
            $table->decimal('total_amount',6,2)->unsigned()->nullable(); // final * duration
            $table->boolean('valid')->default(1);
            $table->integer('plan_id')->unsigned()->index()->nullable();
            $table->foreign('plan_id')->references('id')->on('plans');
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
