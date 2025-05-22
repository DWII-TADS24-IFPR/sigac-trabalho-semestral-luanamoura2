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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('descricao');
            $table->unsignedInteger('horas_in'); 
            $table->unsignedInteger('horas_out');
            $table->string('status');
            $table->text('comentario')->nullable();
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
