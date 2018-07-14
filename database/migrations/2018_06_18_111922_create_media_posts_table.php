<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->foreign('media_id')->references('id')->on('medias')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('post_id')->references('id')->on('posts')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->engine = 'InnoDB';
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
        Schema::table('media_post', function(Blueprint $table) {
            $table->dropForeign('media_posts_media_id_foreign');
            $table->dropForeign('media_posts_post_id_foreign');
        });
        Schema::dropIfExists('media_post');
    }
}
