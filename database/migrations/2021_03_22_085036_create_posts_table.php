<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->text('shortdescription');
            $table->string('email');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('sort');
            $table->string('gtitle');
            $table->string('gdescription');
            $table->string('tag');
            $table->string('publishtime');
            $table->string('openlink');
            $table->integer('category_id');


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
        Schema::dropIfExists('posts');
    }
}
