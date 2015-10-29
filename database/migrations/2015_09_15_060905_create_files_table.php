<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('type');
            $table->string('path');
            $table->string('mime');

            $table->integer('topic_id');
            $table->integer('source_id')->nullable();
            $table->integer('user_id');
            $table->integer('documentable_id');
            $table->string('documentable_type');

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
        Schema::drop('files');
    }
}
