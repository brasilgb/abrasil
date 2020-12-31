<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->integer('id_ordem')->autoIncrement();
            $table->integer('cliente_id');
            $table->foreign('cliente_id')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->date('previsao');
            $table->text('defeito');
            $table->string('equipamento');
            $table->string('modelo');
            $table->string('senha');
            $table->text('estado');
            $table->text('acessorios');
            $table->integer('orcamento');
            $table->text('descorcamento');
            $table->text('detalhes');
            $table->decimal('valpecas');
            $table->decimal('valservico');
            $table->decimal('custo');
            $table->integer('statusorcamento');
            $table->integer('status');
            $table->integer('comunicado');
            $table->integer('entrega');
            $table->date('dt_entrega');
            $table->time('hr_entrega');
            $table->string('tecnico');
            $table->text('observacoes');
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
        Schema::dropIfExists('ordens');
    }
}
