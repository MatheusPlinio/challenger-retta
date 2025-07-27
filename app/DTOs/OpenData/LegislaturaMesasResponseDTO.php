<?php

namespace App\DTOs\OpenData;

class LegislaturaMesasResponseDTO
{
    /**
     * @param MesaDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}
