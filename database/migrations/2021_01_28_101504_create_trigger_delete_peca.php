<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerDeletePeca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `TRG_delete_peca` AFTER DELETE ON `pecas`
        FOR EACH ROW
        BEGIN
        CALL SP_EstoquePecas (
            old.id_peca,
            old.quantidade * -1,
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
        DB::unprepared('DROP TRIGGER `TRG_delete_peca`');
    }
}
