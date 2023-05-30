<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number');
            $table->string('cin');
            $table->string('sexe');
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles');
            $table->string('picture');
        });
    }

    public function down(): void
    {

    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['vehicle_id']);
        $table->dropColumn(['phone_number', 'cin', 'sexe', 'vehicle_id', 'picture']);
    });
    }
};
