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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            /** El siguiente campo debe de ser único en la tabla */
            $table->string('email')->unique();
            //Campo de tipo fecha y hora que puede ser nulo
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('telefono');
            $table->string('calle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations: Revierte todos los cambios que hemos hecho en el método up.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
