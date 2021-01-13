<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->integer('id_agenda')->autoIncrement();
            $table->integer('cliente_id');
            $table->foreign('cliente_id')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->date('data');
            $table->time('hora');
            $table->string('servico');
            $table->text('detalhes');
            $table->string('tecnico');
            $table->integer('status');
            $table->text('observacoes')->nullable();
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
        Schema::dropIfExists('agendas');
    }
}
