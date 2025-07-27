<?php

namespace App\DTOs\OpenData;

class OcupacaoDTO
{
    public function __construct(
        public string $titulo,
        public string $entidade,
        public string $inicio,
        public string $fim
    ) {
    }
}