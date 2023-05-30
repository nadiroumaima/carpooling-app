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
        Schema::table('rides', function (Blueprint $table) {
            $table->string('driver_name')->after('id');
            $table->dateTime('departure_time')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropColumn('new_column1');
        $table->dropColumn('new_column2');
    });
}

};
