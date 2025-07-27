<?php

namespace App\DTOs\OpenData;

class MandatoExternoDTO
{
    public function __construct(
        public string $titulo,
        public string $entidade,
        public string $uf,
        public string $inicio,
        public string $fim
    ) {
    }
}