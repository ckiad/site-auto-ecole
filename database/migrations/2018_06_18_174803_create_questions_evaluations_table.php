<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->foreign('question_id')->references('id')->on('questions')
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
        Schema::table('question_evaluations', function(Blueprint $table) {
            $table->dropForeign('question_evaluations_question_id_foreign');
            $table->dropForeign('question_evaluations_evaluation_id_foreign');
        });
        Schema::dropIfExists('question_evaluations');
    }
}
