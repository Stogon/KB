<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_files', function(Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->text('path');
            $table->string('type', 50);
            $table->boolean('locked')->default(false);
            $table->integer('article_id')->unsigned():
            $table->integer('author_id')->unsigned();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles_files');
    }
}
