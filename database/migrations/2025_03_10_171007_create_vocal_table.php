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
        Schema::create('vocal', function (Blueprint $table) {
            $table->id('pk_vocal');
            $table->string('vocal');
            $table->text('img_vocal');
            $table->unsignedBigInteger('fk_usuario');
            $table->foreign('fk_usuario')->references('pk_usuario')->on('users');
            $table->boolean('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocal');
    }
};
