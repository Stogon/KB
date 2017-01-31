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

        // Category & Section
        Schema::table('sections', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('section_parent_id')->references('id')->on('sections');
        });

        // Articles
        Schema::table('articles', function(Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('articles_votes', function(Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('article_id')->references('id')->on('articles');
        });

        Schema::table('articles_tags_has_articles', function(Blueprint $table) {
            $table->foreign('articles_tags_id')->references('id')->on('articles_tags');
            $table->foreign('articles_id')->references('id')->on('articles');
        });

        Schema::table('articles_files', function(Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('article_id')->references('id')->on('users');
        });

        Schema::table('articles_drafts', function(Blueprint $table) {
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
