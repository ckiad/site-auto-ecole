<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objet')->nullable();
            $table->string('contenu');
            $table->string('emetteur');
            $table->string('motif')->nullable();
            $table->boolean('etat')->default(0);
            $table->integer('user_id')->nullable();
            /* $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict'); */
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
    {/* 
        Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_user_id_foreign');
		}); */
        Schema::dropIfExists('messages');
    }
}
