<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemoignagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temoignages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contenu');
            $table->integer('nbreok')->default(0);
            $table->integer('nbreko')->default(0);
            $table->integer('nbrevu')->default(0);
            $table->boolean('en_ligne')->default(0);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::table('temoignages', function(Blueprint $table) {
			$table->dropForeign('temoignages_user_id_foreign');
		});
        Schema::dropIfExists('temoignages');
    }
}
