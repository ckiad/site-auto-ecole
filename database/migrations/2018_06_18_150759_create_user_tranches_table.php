<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tranche', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('tranche_id')->unsigned();
            $table->integer('formation_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('tranche_id')->references('id')->on('tranches')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('formation_id')->references('id')->on('formations')
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
        Schema::table('user_tranche', function(Blueprint $table) {
            $table->dropForeign('user_tranches_users_id_foreign');
            $table->dropForeign('user_tranches_tranches_id_foreign');
            $table->dropForeign('user_tranches_formations_id_foreign');
        });
        Schema::dropIfExists('user_tranche');
    }
}
