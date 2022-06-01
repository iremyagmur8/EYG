<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{

    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
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
        Schema::dropIfExists('galleries');
    }
}
