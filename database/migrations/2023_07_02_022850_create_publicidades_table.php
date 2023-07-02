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
        Schema::create('publicidades', function (Blueprint $table) {
            $table->id('id_publicidad');
            $table->string('nombre');
            $table->string('url');
            $table->dateTime('fecha_expiracion');
            $table->foreignId('id_post')->constrained('posts', 'id_post');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicidades');
    }
};