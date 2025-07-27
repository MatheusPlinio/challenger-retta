<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Deputado extends Model
{
    protected $fillable = [
        "id",
        "uri",
        "nome",
        "siglaPartido",
        "uriPartido",
        "siglaUf",
        "idLegislatura",
        "urlFoto",
        "email"
    ];

    public $incrementing = false;

    public function despesas()
    {
        return $this->hasMany(Despesa::class);
    }

    public function despesasPorMes(): Collection
    {
        return $this->despesas
            ->groupBy(fn($item) => \Carbon\Carbon::parse($item->dataDocumento)->format('Y-m'))
            ->map(fn($group) => $group->sum('valorDocumento'));
    }

    public function despesasPorCategoria(): Collection
    {
        return $this->despesas
            ->groupBy('tipoDespesa')
            ->map(fn($group) => $group->sum('valorDocumento'));
    }
}
