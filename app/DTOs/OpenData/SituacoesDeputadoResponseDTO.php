<?php

namespace App\DTOs\OpenData;

class SituacoesDeputadoResponseDTO
{
    /**
     * @param SituacaoDeputadoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}