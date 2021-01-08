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
            $table->string('equipamento');
            $table->string('modelo');
            $table->string('senha');
            $table->text('defeito');
            $table->text('estado');
            $table->text('acessorios');
            $table->text('observacoes');
            $table->date('previsao');
            $table->integer('orcamento')->nullable();
            $table->text('descorcamento')->nullable();
            $table->text('detalhes')->nullable();
            $table->decimal('valpecas')->nullable();
            $table->decimal('valservico')->nullable();
            $table->decimal('custo')->nullable();
            $table->integer('status')->nullable();
            $table->date('dt_entrega')->nullable();
            $table->string('tecnico')->nullable();
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
