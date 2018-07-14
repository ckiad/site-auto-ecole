<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_cours', function (Blueprint $table) {
            $table->increments('id');
            $table->engine = 'InnoDB';
            $table->integer('cours_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')->references('id')->on('medias')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('cours_id')->references('id')->on('cours')
            ->onDelete('restrict')->onUpdate('restrict');   
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
        Schema::table('media_cours', function(Blueprint $table) {
            $table->dropForeign('media_cours_media_id_foreign');
            $table->dropForeign('media_cours_cours_id_foreign');
        });
        Schema::dropIfExists('media_cours');
    }
}
