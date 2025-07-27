<?php

namespace App\DTOs\OpenData;

class DeputadoOrgaosResponseDTO
{
    /**
     * @param OrgaoResponseDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}
