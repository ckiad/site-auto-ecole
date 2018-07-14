<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('type');
            $table->string('description')->nullable();
            $table->integer('nbre_ok')->default(0);
            $table->integer('nbre_ko')->default(0);
            $table->integer('nbre_vue')->default(0);
            $table->boolean('en_ligne')->default(0);

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
        Schema::table('cours', function(Blueprint $table) {
			$table->dropForeign('cours_formation_id_foreign');
		});
        Schema::dropIfExists('cours');
    }
}
