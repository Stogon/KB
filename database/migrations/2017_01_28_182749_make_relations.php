<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Users
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('users_states');
        });

        Schema::table('users_settings', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('users_has_roles', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('users_roles');
        });

        // Articles
        Schema::table('articles', function(Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('settings_id')->references('id')->on('articles_settings');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
