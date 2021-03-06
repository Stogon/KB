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
            $table->string('username', 50)->unique();
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->integer('state_id')->unsigned();
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
