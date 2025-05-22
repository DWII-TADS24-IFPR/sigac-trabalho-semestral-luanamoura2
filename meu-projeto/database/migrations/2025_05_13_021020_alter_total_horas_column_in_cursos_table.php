<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->integer('total_horas')->change(); 
        });
    }

    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->decimal('total_horas', 5, 2)->change(); 
        });
    }
};
