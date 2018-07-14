<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGadgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gadget_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('gadget_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('gadget_id')->references('id')->on('gadgets')
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
        Schema::table('gadget_user', function(Blueprint $table) {
            $table->dropForeign('user_gadgets_user_id_foreign');
            $table->dropForeign('user_gadgets_gadget_id_foreign');
        });

        Schema::dropIfExists('gadget_user');
    }
}
