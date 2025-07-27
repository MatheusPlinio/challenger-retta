<?php

namespace App\DTOs\OpenData;

class ProfissaoDTO
{
    public function __construct(
        public string $titulo,
        public string $descricao,
        public string $inicio,
        public ?string $fim
    ) {
    }
}