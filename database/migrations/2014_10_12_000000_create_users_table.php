<?php

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
            $table->string('first_name');
            $table->string('last_name');
            $table->text('code');
            $table->integer('active');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('institution_id');
            $table->integer('course_id');
            $table->integer('year');
            $table->integer('intake');
            $table->integer('notice_notification')->default(1);
            $table->integer('new_user')->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
