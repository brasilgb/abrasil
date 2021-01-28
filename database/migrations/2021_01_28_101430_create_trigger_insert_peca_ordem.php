<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerInsertPecaOrdem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `TRG_insert_peca_ordem` AFTER INSERT ON `pecas_on_ordens`
        FOR EACH ROW
        BEGIN
        CALL SP_EstoquePecas (
            new.id_peca,
            new.quantidade * -1,
            new.valor
                            );
        END
                    ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `TRG_insert_peca_ordem`');
    }
}
