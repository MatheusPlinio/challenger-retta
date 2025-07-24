<?php

namespace App\DTOs\OpenData;

class ReferenciaDeputadoSituacaoResponseDTO
{
    /**
     * @param DeputadoSituacaoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}

class DeputadoSituacaoDTO
{
    public function __construct(
        public int $id,
        public string $descricao
    ) {
    }
}
