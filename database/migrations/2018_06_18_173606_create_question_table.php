<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('texte_question');
            $table->string('separateur');
            $table->string('liste_proposition');
	        $table->integer('nbre_ok')->default(0);
            $table->integer('nbre_ko')->default(0);
	        $table->integer('nbre_vue')->default(0);
            $table->string('niveau_difficulte')->default('facile');
            $table->integer('duree_question')->default(20);


            $table->integer('cours_id')->unsigned();
            $table->foreign('cours_id')->references('id')->on('cours')
            ->onDelete('restrict')
            ->onUpdate('restrict');
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
        Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_cours_id_foreign');
		});
        Schema::dropIfExists('questions');
    }
}
