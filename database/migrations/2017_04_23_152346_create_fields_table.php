<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unquie()->nullable();
            $table->string('group')->unquie()->nullable();
            $table->string('label_ar')->nullable();
            $table->string('label_en')->nullable();
            $table->string('icon')->nullable();
            $table->enum('type', ['text', 'hidden', 'multiple', 'radio','number'])->nullable();
            $table->boolean('is_required')->default(0)->nullable();
            $table->boolean('is_modal')->default(0)->nullable();
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
        Schema::drop('fields');
    }
}
