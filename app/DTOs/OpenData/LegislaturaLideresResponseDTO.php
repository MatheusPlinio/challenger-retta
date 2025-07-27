<?php

namespace App\DTOs\OpenData;

class LegislaturaLideresResponseDTO
{
    /**
     * @param LiderDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}