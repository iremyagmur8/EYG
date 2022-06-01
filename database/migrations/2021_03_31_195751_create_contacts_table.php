<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('slogan');
            $table->string('country');
            $table->string('city');
            $table->string('district');
            $table->string('address');
            $table->string('phone');
            $table->string('fax');
            $table->string('mail');
            $table->string('mail2');
            $table->string('googlemap');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('youtube');
            $table->string('description');

        });
    }


    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
