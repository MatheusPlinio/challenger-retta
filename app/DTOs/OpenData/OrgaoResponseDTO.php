<?php

namespace App\DTOs\OpenData;

class OrgaoResponseDTO
{
    public function __construct(
        public int $idOrgao,
        public string $nomeOrgao,
        public string $titulo,
        public string $siglaOrgao,
        public string $dataInicio,
        public ?string $dataFim
    ) {
    }
}