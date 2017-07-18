<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->integer('duration')->nullable();
            $table->decimal('price',6,3)->unsigned()->nullable();
            $table->decimal('sale_price',6,3)->unsigned()->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('on_sale')->default(1);
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
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
        Schema::drop('plans');
    }
}
