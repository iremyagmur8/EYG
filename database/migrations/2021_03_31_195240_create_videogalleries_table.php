<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideogalleriesTable extends Migration
{

    public function up()
    {
        Schema::create('videogalleries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->text('shortdescription');
            $table->string('sort');
            $table->string('tag');
            $table->string('publishtime');
            $table->string('theme');
            $table->string('openlink');
            $table->integer('category_id');
            $table->string('link');
        });
    }


    public function down()
    {
        Schema::dropIfExists('videogalleries');
    }
}
