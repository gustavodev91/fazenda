<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FaAnimalAlbum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('fa_animal_album')) {
            Schema::create('fa_animal_album', function (Blueprint $table) {
                $table->bigIncrements('id');               
                $table->unsignedBigInteger('animal_id'); 
                $table->string('img_animal',255)->nullable();
                $table->string('des_img_animal',255)->nullable();
                $table->string('ind_principal',1)->nullable();
               
                $table->dateTime('dt_alteracao');
                $table->unsignedBigInteger('usuario_id_alteracao');
                $table->dateTime('dt_criacao');
                $table->unsignedBigInteger('usuario_id_criacao');
                $table->string('ind_situacao',1);

                $table->foreign('animal_id')
                    ->references('id')->on('fa_animal')
                    ->onDelete('no action');

                $table->foreign('usuario_id_alteracao')
                      ->references('id')->on('adm_usuario')
                      ->onDelete('no action');

                $table->foreign('usuario_id_criacao')
                      ->references('id')->on('adm_usuario')
                      ->onDelete('no action');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
