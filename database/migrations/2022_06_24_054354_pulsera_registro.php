<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PulseraRegistro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulsera_resgistro', function (Blueprint $table) {
            $table->id();
            $table->string('id_p');
            $table->string('id_pulsera');
            $table->string('fecha');
            $table->string('hora');
            $table->double('temperatura');
            $table->integer('pulso_cardiaco');
            $table->integer('oxi_sangre');
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
        Schema::dropIfExists('pulsera_resgistro');
    }
}
