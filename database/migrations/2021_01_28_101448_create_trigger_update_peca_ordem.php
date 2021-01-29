<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerUpdatePecaOrdem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `TRG_update_peca_ordem` AFTER UPDATE ON `pecas_on_ordens`
        FOR EACH ROW
        BEGIN
        CALL SP_EstoquePecas (
            new.id_peca,
            old.quantidade - new.quantidade
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
        DB::unprepared('DROP TRIGGER `TRG_update_peca_ordem`');
    }
}
