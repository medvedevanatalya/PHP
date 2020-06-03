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

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('title', 100)->unique();
            $table->text('body');
            $table->string('slug')->nullable()->unique();
            $table->boolean('publish')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
