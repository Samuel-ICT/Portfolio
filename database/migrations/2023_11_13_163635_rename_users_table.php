<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'gebruikersnaam');
            $table->renameColumn('password', 'wachtwoord');
            $table->renameColumn('phone_number', 'telefoon_nummer');
            $table->renameColumn('address', 'adres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('gebruikersnaam', 'name');
            $table->renameColumn('wachtwoord','password');
            $table->renameColumn('telefoon_nummer','phone_number');
            $table->renameColumn('adres','address');
        });
    }
};
