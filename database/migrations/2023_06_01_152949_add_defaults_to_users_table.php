<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->default(NULL)->change();
            $table->string('cin')->nullable()->default(NULL)->change();
            $table->string('sexe')->nullable()->default(NULL)->change();
            $table->string('picture')->nullable()->default(NULL)->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->change();
            $table->string('cin')->nullable()->change();
            $table->string('sexe')->nullable()->change();
            $table->string('picture')->nullable()->change();
        });
    }
}
