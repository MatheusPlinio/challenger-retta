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

class MesaDTO
{
    public function __construct(
        public int $idDeputado,
        public string $nome,
        public string $siglaPartido,
        public string $siglaUf,
        public string $titulo,
        public string $uri
    ) {
    }
}
