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

    public function availableYears(): array
    {
        return $this->despesas()
            ->select('ano')
            ->groupBy('ano')
            ->orderByDesc('ano')
            ->pluck('ano')
            ->toArray();
    }

    public function monthlyExpenses(string|int $year): array
    {
        return $this->despesas()
            ->where('ano', $year)
            ->get()
            ->groupBy('mes')
            ->map(fn(Collection $group) => $group->sum('valorDocumento'))
            ->toArray();
    }

    public function expensesByCategory(string|int $year): array
    {
        return $this->despesas()
            ->where('ano', $year)
            ->get()
            ->groupBy('tipoDespesa')
            ->map(fn(Collection $group) => $group->sum('valorDocumento'))
            ->toArray();
    }
}
