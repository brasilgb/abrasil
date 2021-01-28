<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerDeletePecaOrdem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `TRG_delete_peca_ordem` AFTER DELETE ON `pecas_on_ordens`
        FOR EACH ROW
        BEGIN
        CALL SP_EstoquePecas (
            old.id_peca,
            old.quantidade,
            old.valor
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
        DB::unprepared('DROP TRIGGER `TRG_delete_peca_ordem`');
    }
}
