<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->integer("ano");
            $table->string("cnpjCpfFornecedor");
            $table->string("codDocumento");
            $table->string("codLote");
            $table->string("codTipoDocumento");
            $table->string("dataDocumento");
            $table->integer("mes");
            $table->string("nomeFornecedor");
            $table->string("numDocumento");
            $table->string("numRessarcimento");
            $table->integer("parcela");
            $table->string("tipoDespesa");
            $table->string("tipoDocumento");
            $table->text("urlDocumento");
            $table->integer("valorDocumento");
            $table->integer("valorGlosa");
            $table->integer("valorLiquido");

            $table->foreignId('user_id')->constrained('deputados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};