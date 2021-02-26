<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_paradero', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('direccion');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->char('telefono',20);
            $table->string('email')->unique();
            $table->string('direccion');
            $table->char('tipo',1);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('contrato_personal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_id');
            $table->timestamp('fecha_contrato');
            $table->integer('tiempo')->nullable();
            $table->double('sueldo');
            $table->char('estado',1)->default('1');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id','contrato_has_personal')->references('id')->on('personal');
        });
        Schema::create('reglamento', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('gerente_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('gerente_id', 'reglamento_has_gerente_ibfk_1')->references('id')->on('personal');
        });
        Schema::create('actividad', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('gerente_id');
            $table->timestamp('fecha');
            //$table->string('ubicacion');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('gerente_id', 'actividad_has_gerente_ibfk_1')->references('id')->on('personal');
        });
        //Cliente
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('telefono');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('reclamo', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('personal_id')->references('id')->on('personal');
        });
        Schema::create('registro_torneo', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('personal_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_id')->references('id')->on('personal');
        });
        Schema::create('propietario', function (Blueprint $table) {
            $table->id();
            $table->char('dni',8);
            $table->string('nombre_propietario');
            $table->string('apellidoPaterno_propietario');
            $table->string('apellidoMaterno_propietario');
            $table->string('telefono_propietario');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->id();
            $table->string('tarjeta_propiedad')->nullable();;
            //$table->string('soat_afocat_numero')->nullable();
            $table->string('soat_afocat')->nullable();
            $table->string('certificado_gps')->nullable();
            $table->string('certificado_gas')->nullable();
            $table->string('revision_tecnica')->nullable();
            //aqui meter los datos del vehiculo en el crud
            $table->unsignedBigInteger('propietario_id');
            $table->char('estado',1)->default('0');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('propietario_id')->references('id')->on('propietario');
        });
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->id();
            //color, marca, modelo
            $table->string('placa');
            $table->string('color')->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->unsignedBigInteger('inscripcion_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('inscripcion_id')->references('id')->on('inscripcion');
        });
        Schema::create('ficha_conductor', function (Blueprint $table) {
            $table->id();
            //Nuevo
            $table->string('nombres');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('direccion')->nullable();
            //old
            $table->string('certificado_pnp')->nullable();
            $table->string('brevete_nro');
            $table->string('brevete')->nullable();
            $table->string('fotocheck')->nullable();
            $table->char('dni',8);
            $table->string('recibo')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('conductor', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_contrato');
            $table->string('observaciones')->nullable();
            $table->unsignedBigInteger('ficha_conductor_id');
            $table->foreign('ficha_conductor_id')->references('id')->on('ficha_conductor');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('documento_inscripcion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conductor_id');
            $table->unsignedBigInteger('propietario_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('conductor_id')->references('id')->on('conductor');
            $table->foreign('propietario_id')->references('id')->on('propietario');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculo');
        });
        Schema::create('inspeccion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documento_inscripcion_id');
            $table->string('observaciones')->nullable();
            $table->timestamp('fecha');
            $table->char('estado',1)->default('1');
            $table->timestamps();
            $table->softDeletes();
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
        });
        Schema::create('contrato_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('lugar');
            $table->string('duracion');
            $table->string('fecha');
            $table->char('estado',1)->default('1');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cliente_id')->references('id')->on('cliente');
        });
        Schema::create('registro_servicio_invitado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato_servicio_id');
            $table->double('costo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('contrato_servicio_id')->references('id')->on('contrato_servicio');
        });
        Schema::create('registro_servicio_taxi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cliente_id')->references('id')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejemplo');
    }
}
