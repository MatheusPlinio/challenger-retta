<?php

namespace App\DTOs\OpenData;

class DeputadoOrgaosResponseDTO
{
    /**
     * @param OrgaoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}

class OrgaoDTO
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
