<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_passage');
            $table->integer('note_obtenu');

            $table->integer('user_id')->unsigned();
            $table->integer('evaluation_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('evaluation_id')->references('id')->on('evaluations')
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
        Schema::table('user_evaluation', function(Blueprint $table) {
            $table->dropForeign('user_evaluations_user_id_foreign');
            $table->dropForeign('user_evaluations_evaluation_id_foreign');
        });
        Schema::dropIfExists('user_evaluation');
    }
}
