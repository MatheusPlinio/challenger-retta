<?php

namespace App\DTOs\OpenData;

class DeputadoMandatosExternosResponseDTO
{
    /**
     * @param MandatoExternoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}

class MandatoExternoDTO
{
    public function __construct(
        public string $titulo,
        public string $entidade,
        public string $uf,
        public string $inicio,
        public string $fim
    ) {
    }
}

class LinkDTO
{
    public function __construct(
        public string $href,
        public string $rel,
        public string $type
    ) {
    }
}
