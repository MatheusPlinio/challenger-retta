<?php

namespace App\DTOs\OpenData;

class DeputadoHistoricoResponseDTO
{
    /**
     * @param HistoricoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}
