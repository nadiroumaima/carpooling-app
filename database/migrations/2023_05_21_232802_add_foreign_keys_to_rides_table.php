<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {    
        Schema::table('rides', function (Blueprint $table) {
            // Add driver_id column
            $table->unsignedBigInteger('driver_id')->after('id');

            // Add foreign key constraint to driver_id column referencing the id column of the users table
            $table->foreign('driver_id')->references('id')->on('users');

            // Add foreign key constraint to name column referencing the name column of the users table
            $table->foreign('name')->references('name')->on('users');
            $table->timestamp('created_at')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rides', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['driver_id']);
            $table->dropForeign(['name']);

            // Drop driver_id column
            $table->dropColumn('driver_id');
        });
    }
};
