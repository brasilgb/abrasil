<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('phone', 50)->nullable();
            $table->string('mobile_phone', 50);
            $table->string('address', 200);
            $table->integer('house_number');
            $table->string('complement', 50)->nullable();
            $table->string('neighborhood', 50);
            $table->char('state', 100);
            $table->string('city', 50);
            $table->string('zip_code', 20);
            $table->string('cpf', 20)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('contact_phone', 50)->nullable();
            $table->string('contact_mobile', 50)->nullable();
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
        Schema::dropIfExists('clients');
    }
}