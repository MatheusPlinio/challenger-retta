<?php

namespace App\DTOs\OpenData;

class DeputadoProfissoesResponseDTO
{
    /**
     * @param ProfissaoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}

class ProfissaoDTO
{
    public function __construct(
        public string $titulo,
        public string $descricao,
        public string $inicio,
        public ?string $fim
    ) {
    }
}
