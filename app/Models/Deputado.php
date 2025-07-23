<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deputado extends Model
{
    protected $fillable = [
        "uri",
        "nome",
        "siglaPartido",
        "uriPartido",
        "siglaUf",
        "idLegislatura",
        "urlFoto",
        "email"
    ];

    public function despesas()
    {
        return $this->hasMany(Despesa::class);
    }
}
