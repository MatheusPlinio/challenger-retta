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

class SituacaoDeputadoDTO
{
    public function __construct(
        public int $id,
        public string $descricao
    ) {
    }
}
