<?php

namespace App\DTOs\OpenData;

class LiderDTO
{
    public function __construct(
        public int $idDeputado,
        public string $nomeDeputado,
        public string $siglaPartido,
        public string $siglaUf,
        public string $tipo,
        public string $uri
    ) {
    }
}