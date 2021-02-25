<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Asistencia_Personal', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->char('estado',1);
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });

        Schema::create('registro_ocurrencias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });

        /* Schema::create('inspeccion', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->string('observacion');
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('documento_inscripcion_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
            $table->foreign('documento_inscripcion_id')->references('id')->on('documento_inscripcion');
        });

        Schema::create('reporte_inspeccion', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_creacion');
            $table->unsignedBigInteger('personal_id');
            $table->string('archivo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        }); */

        Schema::create('registro_sanciones', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->string('observacion');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });

        Schema::create('justificación_falta', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_justificacion');
            $table->string('descripcion');
            $table->unsignedBigInteger('registro_sancion_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('registro_sancion_id')->references('id')->on('registro_sanciones');
        });

        Schema::create('reporte_sanciones', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_creacion');
            $table->unsignedBigInteger('personal_id');
            $table->string('archivo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });

        Schema::create('registro_pago_personal', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->timestamp('fecha_pago');
            $table->string('descripcion');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });

        Schema::create('registro_egreso', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->timestamp('fecha_egreso');
            $table->string('descripcion');
            $table->unsignedBigInteger('registro_pago_personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('registro_pago_personal_id')->references('id')->on('registro_pago_personal');
        });

        Schema::create('registro_pago_base', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->timestamp('fecha_pago');
            $table->string('descripcion');
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('conductor_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
            $table->foreign('conductor_id')->references('id')->on('conductor');
        });

        Schema::create('registro_ingreso', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->timestamp('fecha_ingreso');
            $table->string('descripcion');
            $table->unsignedBigInteger('registro_pago_base_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('registro_pago_base_id')->references('id')->on('registro_pago_base');
        });

        Schema::create('registro_tributario', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->timestamp('fecha_pago_tributo');
            $table->string('descripcion');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });

        Schema::create('balance_general', function (Blueprint $table) {
            $table->id();
            $table->float('activos');
            $table->float('pasivos');
            $table->float('capital');
            $table->timestamp('fecha_pago_tributo');
            $table->string('descripcion');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });

        Schema::create('estado_ganancia_perdida', function (Blueprint $table) {
            $table->id();
            $table->float('utilidad_bruta');
            $table->float('impuestos');
            $table->timestamp('fecha');
            $table->string('descripcion');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });

        Schema::create('registro_contable', function (Blueprint $table) {
            $table->id();
            $table->float('ingreso');
            $table->float('egreso');
            $table->timestamp('fecha');
            $table->string('descripcion');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
