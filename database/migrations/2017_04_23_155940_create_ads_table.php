<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price', 6, 2)->unsigned()->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('featured')->default(0);
            $table->boolean('phone')->default(1);
            $table->enum('condition', ['new', 'old'])->nullable();
            $table->string('manufacturing_year')->nullable();
            $table->string('mileage')->nullable();
            $table->string('transmission')->nullable();
            $table->string('room_no')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('bathroom_no')->nullable();
            $table->string('rent_type')->nullable();
            $table->string('building_age')->nullable();
            $table->boolean('furnished')->nullable();
            $table->string('space')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();


            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('area_id')->unsigned()->index()->nullable();
            $table->foreign('area_id')->references('id')->on('areas');

            $table->integer('brand_id')->unsigned()->index()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->integer('model_id')->unsigned()->index()->nullable();
            $table->foreign('model_id')->references('id')->on('models');

            $table->integer('color_id')->unsigned()->index()->nullable();
            $table->foreign('color_id')->references('id')->on('colors');

            $table->integer('size_id')->unsigned()->index()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
