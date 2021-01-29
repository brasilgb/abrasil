<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePecaOrdemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peca_ordem', function (Blueprint $table) {
            $table->integer('id_ordem');
            $table->integer('id_peca');
            $table->integer('quantidade');
            $table->foreign('id_ordem')->references('id_ordem')->on('ordens')->onDelete ('cascade');
            $table->foreign('id_peca')->references('id_peca')->on('pecas')->onDelete ('cascade');
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
        Schema::dropIfExists('peca_ordem');
    }
}
