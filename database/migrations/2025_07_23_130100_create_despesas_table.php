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
            $table->integer("ano")->nullable();
            $table->string("cnpjCpfFornecedor")->nullable();
            $table->string("codDocumento")->nullable();
            $table->string("codLote")->nullable();
            $table->string("codTipoDocumento")->nullable();
            $table->string("dataDocumento")->nullable();
            $table->integer("mes")->nullable();
            $table->string("nomeFornecedor")->nullable();
            $table->string("numDocumento")->nullable();
            $table->string("numRessarcimento")->nullable();
            $table->integer("parcela")->nullable();
            $table->string("tipoDespesa")->nullable();
            $table->string("tipoDocumento")->nullable();
            $table->text("urlDocumento")->nullable();
            $table->integer("valorDocumento")->nullable();
            $table->integer("valorGlosa")->nullable();
            $table->integer("valorLiquido")->nullable();

            $table->foreignId('deputado_id')->constrained('deputados');
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