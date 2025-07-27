<?php

namespace App\DTOs\OpenData;

class FrenteDTO
{
    public function __construct(
        public int $idFrente,
        public string $titulo,
        public string $uriFrente,
        public string $situacao
    ) {
    }
}