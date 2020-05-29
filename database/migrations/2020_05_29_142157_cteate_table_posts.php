<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CteateTablePosts extends Migration
{
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('title', 50)->unique();
            $table->text('post');
            $table->string('slug')->unique();
            $table->boolean('publish');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
