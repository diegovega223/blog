<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('changes_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_post')->constrained('posts', 'id');
            $table->foreignId('id_user')->constrained('users', 'id');
            $table->boolean('titulo')->default(false);
            $table->boolean('cuerpo')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('changes_posts');
    }
};
