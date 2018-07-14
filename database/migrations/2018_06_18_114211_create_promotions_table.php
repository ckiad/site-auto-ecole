<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_debut');
            $table->integer('duree')->default(0);
            $table->boolean('active')->default(0);
            $table->double('montant');
            $table->integer('nbre_ok')->default(0);
	        $table->integer('nbre_ko')->default(0);
	        $table->integer('nbre_vu')->default(0);

            $table->integer('formation_id')->unsigned();
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
        Schema::table('promotions', function(Blueprint $table) {
			$table->dropForeign('promotions_formation_id_foreign');
		});
        Schema::dropIfExists('promotions');
    }
}
