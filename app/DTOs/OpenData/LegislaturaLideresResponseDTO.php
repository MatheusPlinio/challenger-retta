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

class LiderDTO
{
    public function __construct(
        public int $idDeputado,
        public string $nomeDeputado,
        public string $siglaPartido,
        public string $siglaUf,
        public string $tipo,
        public string $uri
    ) {
    }
}
