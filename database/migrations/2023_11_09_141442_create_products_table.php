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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('slug');
            $table->string('merk');
            $table->text('beschrijving');
            $table->string('foto');
            $table->string('categorie');
            $table->integer('hoeveelheid');
            $table->integer('prijs');
            $table->integer('korting_prijs');
            $table->tinyInteger('trending')->comment('1=trending,0=not trending')->default('0');
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
        Schema::dropIfExists('products');
    }
};