<?php

namespace App\DTOs\OpenData;

class SituacaoDeputadoDTO
{
    public function __construct(
        public int $id,
        public string $descricao
    ) {
    }
}
