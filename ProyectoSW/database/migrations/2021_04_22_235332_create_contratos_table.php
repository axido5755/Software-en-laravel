<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id('id_contrato');
            $table->String('Usuario');
            $table->bigInteger('id_proveedor')->unsigned();
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedors');
            $table->TEXT('Descripcion')->nullable();
            
            $table->String('Estado');

            $table->String('Ciudad');

            $table->String('Numero_ComputadoresP1');
            $table->String('Numero_ComputadoresP2');

            $table->String('Duracion_garantia');
            $table->String('Duracion_Contrato');

            $table->date('Fecha_Creacion');

            $table->String('PDF_Contrato')->nullable();
            $table->timestamps();//No borrar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
