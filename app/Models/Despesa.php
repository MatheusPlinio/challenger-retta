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
        "deputado_id"
    ];

    public function deputado()
    {
        return $this->belongsTo(Deputado::class);
    }

    public function groupedByMonth()
    {
        return $this->groupBy(fn($item) => Carbon::parse($item->dataDocumento)->format('Y-m'))
            ->map(fn($group) => $group->sum('valorDocumento'));
    }

    public function groupedByCategory()
    {
        return $this->groupBy('tipoDespesa')
            ->map(fn($group) => $group->sum('valorDocumento'));
    }
}
