<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // dropping should not be neccessary in the first migration...
        Schema::dropIfExists('articles');
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        Schema::dropIfExists('comments');
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('article_id');
            $table->string('subject');
            $table->text('body');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles');
        });

        Schema::dropIfExists('likes');
        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
            $table->integer('counter');
            $table->foreign('article_id')->references('id')->on('articles');
        });

        Schema::dropIfExists('views');
        Schema::create('views', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
            $table->integer('counter');
            $table->foreign('article_id')->references('id')->on('articles');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('views');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('articles');
    }
};
