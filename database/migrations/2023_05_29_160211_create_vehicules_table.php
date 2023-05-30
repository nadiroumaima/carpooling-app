<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('license_plate');
            $table->string('color');
            $table->string('model');
            $table->string('brand');
            $table->unsignedSmallInteger('capacity');
            $table->foreignId('user_id')->constrained('users');

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
