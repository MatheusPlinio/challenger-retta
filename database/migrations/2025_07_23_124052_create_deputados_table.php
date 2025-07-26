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
        Schema::create('deputados', function (Blueprint $table) {
            $table->id();
            $table->text("uri")->nullable();
            $table->string("nome");
            $table->string("siglaPartido", 8)->nullable();
            $table->text("uriPartido")->nullable();
            $table->char("siglaUf", 2)->nullable();
            $table->bigInteger("idLegislatura")->nullable();
            $table->text("urlFoto")->nullable();
            $table->string("email")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deputados');
    }
};