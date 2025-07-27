<?php

namespace App\DTOs\OpenData;

class DeputadoOcupacoesResponseDTO
{
    /**
     * @param OcupacaoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}