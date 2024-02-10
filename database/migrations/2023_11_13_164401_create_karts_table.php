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
        Schema::create('karts', function (Blueprint $table) {
            $table->id();
            $table->string('naam')->nullable();
            $table->string('email')->nullable();
            $table->string('telefoon_nummer')->nullable();
            $table->string('adres')->nullable();
            $table->string('product_naam')->nullable();
            $table->string('aantal')->nullable();
            $table->string('prijs')->nullable();
            $table->string('foto')->nullable();
            $table->string('product_id')->nullable();
            $table->string('gebruikers_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karts');
    }
};
