<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionGTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactiong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('gadget_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('gadget_id')->references('id')->on('gadgets')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('transactiong', function(Blueprint $table) {
            $table->dropForeign('transactiong_gadget_id_foreign');
            $table->dropForeign('transactiong_user_id_foreign');
        });
        Schema::dropIfExists('transactiong');
    }
}
