<?php

namespace App\Models;

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
}
