<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{

    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->text('kurulturu');

            $table->text('shortdescription');
            $table->string('sort');
            $table->string('place');
            $table->string('publishtime');
            $table->string('openlink');
            $table->string('video');
            $table->string('link');
        });
    }


    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
