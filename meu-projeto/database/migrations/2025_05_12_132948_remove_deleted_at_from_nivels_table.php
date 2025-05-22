<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDeletedAtFromNivelsTable extends Migration
{
    public function up()
    {
        Schema::table('nivels', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }

    public function down()
    {
        Schema::table('nivels', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
