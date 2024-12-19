<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabla: Constructores
        Schema::create('constructores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('pais', 50)->nullable();
            $table->timestamps();
        });

        // Tabla: Equipos
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->date('fundacion')->nullable();
            $table->string('pais', 50)->nullable();
            $table->foreignId('constructor_id')->constrained('constructores')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla: Pilotos
        Schema::create('pilotos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('pais', 50)->nullable();
            $table->foreignId('equipo_id')->nullable()->constrained('equipos')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla: Autos
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo', 100)->nullable();
            $table->string('motor', 50)->nullable();
            $table->foreignId('constructor_id')->nullable()->constrained('constructores')->onDelete('cascade');
            $table->foreignId('equipo_id')->nullable()->constrained('equipos')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla: Circuitos
        Schema::create('circuitos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('ubicacion', 100)->nullable();
            $table->decimal('longitud', 10, 2)->nullable();
            $table->timestamps();
        });

        // Tabla: Campeonatos
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->integer('año');
            $table->timestamps();
        });

        // Tabla: Carreras
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->date('fecha');
            $table->foreignId('circuito_id')->constrained('circuitos')->onDelete('cascade');
            $table->foreignId('campeonato_id')->constrained('campeonatos')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla: Resultados
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carrera_id')->constrained('carreras')->onDelete('cascade');
            $table->foreignId('piloto_id')->constrained('pilotos')->onDelete('cascade');
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->integer('posicion');
            $table->time('tiempo')->nullable();
            $table->integer('puntos')->nullable();
            $table->timestamps();
        });

        // Tabla: Puntos
        Schema::create('puntos', function (Blueprint $table) {
            $table->id();
            $table->integer('posicion');
            $table->integer('puntos');
            $table->timestamps();
        });

        // Tabla: Patrocinadores
        Schema::create('patrocinadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('pais', 50)->nullable();
            $table->timestamps();
        });

        // Tabla: Patrocinios
        Schema::create('patrocinios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->foreignId('patrocinador_id')->constrained('patrocinadores')->onDelete('cascade');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
        });

        // Tabla: Roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        // Tabla: Personal
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->foreignId('rol_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('equipo_id')->nullable()->constrained('equipos')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla: Historial de Cambios
        Schema::create('historial_de_cambios', function (Blueprint $table) {
            $table->id();
            $table->string('tabla', 100);
            $table->enum('accion', ['Insert', 'Update', 'Delete']);
            $table->dateTime('fecha');
            $table->string('usuario', 50)->nullable();
            $table->json('detalle')->nullable();
            $table->timestamps();
        });

        // Tabla: Eventos Especiales
        Schema::create('eventos_especiales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->date('fecha');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        // Tabla pivot: Eventos Especiales - Carreras (Muchos a Muchos)
        Schema::create('eventos_carreras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos_especiales')->onDelete('cascade');
            $table->foreignId('carrera_id')->constrained('carreras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos_carreras');
        Schema::dropIfExists('eventos_especiales');
        Schema::dropIfExists('historial_de_cambios');
        Schema::dropIfExists('personal');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('patrocinios');
        Schema::dropIfExists('patrocinadores');
        Schema::dropIfExists('puntos');
        Schema::dropIfExists('resultados');
        Schema::dropIfExists('carreras');
        Schema::dropIfExists('campeonatos');
        Schema::dropIfExists('circuitos');
        Schema::dropIfExists('autos');
        Schema::dropIfExists('pilotos');
        Schema::dropIfExists('equipos');
        Schema::dropIfExists('constructores');
    }
};
