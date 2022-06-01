<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->text('shortdescription');
            $table->string('link');
            $table->string('sort');
            $table->string('gtitle');
            $table->string('gdescription');
            $table->string('gkeywords');
            $table->string('icon');
            $table->string('openlink');
            $table->integer('parent_id');
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
        Schema::dropIfExists('categories');
    }
}
