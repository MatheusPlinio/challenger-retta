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

class FrenteDTO
{
    public function __construct(
        public int $idFrente,
        public string $titulo,
        public string $uriFrente,
        public string $situacao
    ) {}
}

class LinkDTO
{
    public function __construct(
        public string $href,
        public string $rel,
        public string $type
    ) {}
}
