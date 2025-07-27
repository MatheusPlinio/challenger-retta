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