<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('rides', function (Blueprint $table) {
            $table->decimal('source_latitude', 10, 7)->nullable();
            $table->decimal('source_longitude', 10, 7)->nullable();
            $table->decimal('destination_latitude', 10, 7)->nullable();
            $table->decimal('destination_longitude', 10, 7)->nullable();
        });
    }

    public function down()
    {
        Schema::table('rides', function (Blueprint $table) {
            $table->dropColumn('source_latitude');
            $table->dropColumn('source_longitude');
            $table->dropColumn('destination_latitude');
            $table->dropColumn('destination_longitude');
        });
    }
};
