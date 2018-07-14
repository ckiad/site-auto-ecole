<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranches', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->double('montant')->default(0);
            $table->integer('numero_ordre');
            $table->integer('formation_id')->unsigned();

            $table->foreign('formation_id')->references('id')->on('formations')
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
        Schema::table('tranches', function(Blueprint $table) {
			$table->dropForeign('tranches_formation_id_foreign');
		});
        Schema::dropIfExists('tranches');
    }
}
