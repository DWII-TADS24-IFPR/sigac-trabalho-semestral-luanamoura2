<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->unsignedInteger('horas_in')->change();
            $table->unsignedInteger('horas_out')->change();
        });
    }

    public function down(): void
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->decimal('horas_in', 5, 2)->change();
            $table->decimal('horas_out', 5, 2)->change();
        });
    }
};
