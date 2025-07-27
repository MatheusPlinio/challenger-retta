<?php

namespace App\DTOs\OpenData;

class HistoricoDTO
{
    public function __construct(
        public int $idLegislatura,
        public string $dataInicio,
        public string $dataFim,
        public string $uf,
        public int $idPartido,
        public string $siglaPartido,
        public string $uriPartido,
        public string $titulo,
        public string $nome
    ) {
    }
}