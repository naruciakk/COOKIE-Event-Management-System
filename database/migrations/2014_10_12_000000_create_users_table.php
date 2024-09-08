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
            $table->string('name');
            $table->string('nickname');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->string('sign');
            $table->integer('rank');
            $table->integer('admin')->default(0); //0 - not admin, 1 – admin
            $table->integer('discount')->default(0);
            $table->integer('on_event');
            $table->integer('adult');
            $table->integer('night');
            $table->text('notes');
            $table->string('payment');
            $table->integer('payment_paid'); //0 - no, 1 - pre, 2 - on place
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
