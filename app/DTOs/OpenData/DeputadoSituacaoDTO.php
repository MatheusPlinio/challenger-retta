<?php

namespace App\DTOs\OpenData;

class DeputadoSituacaoDTO
{
    public function __construct(
        public int $id,
        public string $descricao
    ) {
    }
}