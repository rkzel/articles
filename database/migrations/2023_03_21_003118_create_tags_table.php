<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('article_id');
            $table->string('tag_name');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};

