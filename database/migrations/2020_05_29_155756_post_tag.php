<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTag extends Migration
{
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table){
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
