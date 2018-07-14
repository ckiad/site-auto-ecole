<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date');
            $table->boolean('en_ligne')->default(0);
            $table->integer('formation_id')->unsigned();
            $table->string('label');
	          $table->integer('jaime')->default(0);
            $table->foreign('formation_id')->references('id')->on('formations')
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
        Schema::table('evaluations', function(Blueprint $table) {
			$table->dropForeign('evaluations_formation_id_foreign');
		});
        Schema::dropIfExists('evaluations');
    }
}
