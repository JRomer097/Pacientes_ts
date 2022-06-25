<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS actualizar_id_pacientePersonalizado;');
        DB::unprepared('CREATE PROCEDURE actualizar_id_pacientePersonalizado(
            )
            BEGIN
                DECLARE id_personalizada VARCHAR(50);
                DECLARE id_pacienteRegistro VARCHAR(50);
                DECLARE id_registro INT(10);
                SELECT id, id_pacientePersonalizada FROM pacientes WHERE id_pacientePersonalizada IS NULL LIMIT 1 INTO id_registro, id_pacienteRegistro;
                IF (id_registro IS NOT NULL) THEN
                    WHILE (id_registro IS NOT NULL) DO
                        SET id_personalizada = (SELECT id_pacientePersonalizada FROM id_generados_pacientes WHERE id_paciente = id_registro);
                        UPDATE pacientes SET id_pacientePersonalizada = id_personalizada WHERE id = id_registro;
                        SELECT id, id_pacientePersonalizada FROM pacientes WHERE id_pacientePersonalizada IS NULL LIMIT 1 INTO id_registro, id_pacienteRegistro;
                        IF (id_registro = "")THEN
                            SET id_registro = NULL ;
                        END IF;
                    END WHILE;
                END IF;
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
