<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->unsignedBigInteger('turma_id')->nullable()->after('nome');

            
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['turma_id']);
            $table->dropColumn('turma_id');
        });
    }
};

