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
        Schema::create('cambios_posts', function (Blueprint $table) {
            $table->id('id_cambio');
            $table->foreignId('id_post')->constrained('posts', 'id_post');
            $table->foreignId('id_autor')->constrained('autores', 'id_autor');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cambios_posts');
    }
};

