<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unquie();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('timing')->nullable();
            $table->string('address')->nullable();
            $table->mediumText('description')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('active')->default(1);
            $table->boolean('is_mobile_visible')->default(1);
            $table->boolean('is_email_visible')->default(1);
            $table->string('avatar')->default('sample.png')->nullable();
            $table->integer('country_id')->unsigned()->index()->default(118);
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('area_id')->unsigned()->index()->nullable();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
