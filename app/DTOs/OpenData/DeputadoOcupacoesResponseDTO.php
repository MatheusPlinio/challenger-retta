<?php

namespace App\DTOs\OpenData;

class DeputadoOcupacoesResponseDTO
{
    /**
     * @param OcupacaoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}

class OcupacaoDTO
{
    public function __construct(
        public string $titulo,
        public string $entidade,
        public string $inicio,
        public string $fim
    ) {
    }
}
