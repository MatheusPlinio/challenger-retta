<?php

namespace App\DTOs\OpenData;

class MesaDTO
{
    public function __construct(
        public int $idDeputado,
        public string $nome,
        public string $siglaPartido,
        public string $siglaUf,
        public string $titulo,
        public string $uri
    ) {
    }
}