<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->id('id_anexo');
            $table->bigInteger('id_contrato')->unsigned();
            $table->foreign('id_contrato')->references('id_contrato')->on('contratos')->onDelete('cascade');
            $table->char('n_anexo',30);
            $table->char('titulo',30);
            $table->LONGTEXT('contenido');
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
        Schema::dropIfExists('anexos');
    }
}
