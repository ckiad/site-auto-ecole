<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('label',80);
            $table->string('contenu')->nullable();
            $table->boolean('enligne')->default(0);
	    $table->integer('nbreok')->default(0);
            $table->integer('nbreko')->default(0);
            $table->integer('nbrevu')->default(0);
            $table->string('type');
            $table->string('url');
            $table->string('lieu');
            $table->timestamps();
            $table->engine = 'InnoDB';
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
