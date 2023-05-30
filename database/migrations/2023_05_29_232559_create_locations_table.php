<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
        {
            Schema::create('locations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->decimal('latitude', 10, 8);
                $table->decimal('longitude', 10, 8);
                $table->timestamp('timestamp');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
            });
        }

    public function down()
        {
            Schema::dropIfExists('locations');
        }


};
