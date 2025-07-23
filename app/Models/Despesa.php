<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable = [
        "ano",
        "cnpjCpfFornecedor",
        "codDocumento",
        "codLote",
        "codTipoDocumento",
        "dataDocumento",
        "mes",
        "nomeFornecedor",
        "numDocumento",
        "numRessarcimento",
        "parcela",
        "tipoDespesa",
        "tipoDocumento",
        "urlDocumento",
        "valorDocumento",
        "valorGlosa",
        "valorLiquido",
        "user_id"
    ];

    public function deputado()
    {
        return $this->belongsTo(Deputado::class);
    }
}
