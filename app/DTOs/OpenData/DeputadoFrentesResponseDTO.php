<?php

namespace App\DTOs\OpenData;

class DeputadoFrentesResponseDTO
{
    /**
     * @param FrenteDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {}
}
