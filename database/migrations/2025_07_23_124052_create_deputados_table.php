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
            $table->text("uri");
            $table->string("nome");
            $table->string("siglaPartido", 8);
            $table->text("uriPcolumn: artido");
            $table->char("siglaUf", 2);
            $table->bigInteger("idLegislatura");
            $table->text("urlFoto");
            $table->string("email");
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