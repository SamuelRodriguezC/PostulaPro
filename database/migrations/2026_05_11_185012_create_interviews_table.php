<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained();
            $table->dateTime('interview_date');
            $table->enum('interview_type', ["Virtual","Presencial","Telefono","Tecnica","RRHH"]);
            $table->string('interviewer_name', 150)->nullable();
            $table->longText('notes')->nullable();
            $table->enum('result', ["Pendiente","Aprobada","Rechazada","Siguiente_ronda"])->default('Pendiente');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
