<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('post_id')->index();
            $table->string('title');
            $table->string('description')->nullable()->change();
            $table->string('content')->nullable()->change();
            $table->string('link')->nullable()->change();
            $table->string('user_id')->references('id')->on('user');
            $table->string('category_id')->references('id')->on('category_id')->default('1');
            $table->integer('crawler_id')->nullable()->change();
            $table->dateTime('pubDate');
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
        Schema::dropIfExists('post');
    }
}
