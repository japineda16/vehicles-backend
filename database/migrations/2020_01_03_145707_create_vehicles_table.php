<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('licensePlate');
            $table->integer('mileage');
            $table->string('year');
            $table->string('clientName');
            $table->string('clientPhoneNumber');
            $table->text('observations');
            $table->boolean('retrovisor_izquierdo');
            $table->boolean('retrovisor_derecho');
            $table->boolean('retrovisor_interno');
            $table->boolean('alfombras');
            $table->boolean('cepillos_de_parabrisas');
            $table->boolean('antena');
            $table->boolean('estereo');
            $table->boolean('tapa_de_gasolina');
            $table->boolean('tapa_valvula_de_aire');
            $table->boolean('placa_delantera');
            $table->boolean('placa_trasera');
            $table->boolean('capo');
            $table->boolean('compuerta_trasera');
            $table->boolean('pintura');
            $table->boolean('parabrisas');
            $table->boolean('puertas_abrir_cerrar');
            $table->boolean('manillas');
            $table->boolean('cocuyos');
            $table->boolean('emblema');
            $table->boolean('parachoques');
            $table->boolean('tapas_de_rines');
            $table->boolean('cinturones_de_seguridad');
            $table->boolean('neumaticos');
            $table->boolean('techo');
            $table->boolean('encendedor_de_cigarrillo');
            $table->boolean('luces_neblina_delanteras');
            $table->boolean('luces_traseras');
            $table->boolean('luces_delanteras');
            $table->boolean('luces_altas');
            $table->boolean('corneta');
            $table->boolean('alarma');
            $table->boolean('vidrios_suben_bajan');
            $table->boolean('luces_stock');
            $table->boolean('luces_internas');
            $table->boolean('aire_acondicionado');
            $table->boolean('frenos');
            $table->boolean('bateria');
            $table->boolean('extinguidor');
            $table->boolean('cables_para_corriente');
            $table->boolean('gato');
            $table->boolean('triangulo');
            $table->boolean('llave_de_seguridad');
            $table->boolean('llave_ajustar_tuercas');
            $table->boolean('neumatico_repuesto');
            $table->boolean('taza_de_ruedas');
            $table->string('fuel_level');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
