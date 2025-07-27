<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\DeputadoRepositoryInterface;

class DeputadoRepository implements DeputadoRepositoryInterface
{
    public function storeOrUpdate(object $deputy): mixed
    {
        return Deputado::updateOrCreate(
            ['id' => $deputy->id],
            [
                'uri' => $deputy->uri,
                'nome' => $deputy->nome,
                'siglaPartido' => $deputy->siglaPartido,
                'uriPartido' => $deputy->uriPartido,
                'siglaUf' => $deputy->siglaUf,
                'idLegislatura' => $deputy->idLegislatura,
                'urlFoto' => $deputy->urlFoto,
                'email' => $deputy->email,
            ]
        );
    }
}