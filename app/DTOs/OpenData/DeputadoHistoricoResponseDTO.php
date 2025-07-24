<?php

namespace App\DTOs\OpenData;

class DeputadoHistoricoResponseDTO
{
    /**
     * @param HistoricoDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public array $dados,
        public array $links = []
    ) {
    }
}

class HistoricoDTO
{
    public function __construct(
        public int $idLegislatura,
        public string $dataInicio,
        public string $dataFim,
        public string $uf,
        public int $idPartido,
        public string $siglaPartido,
        public string $uriPartido,
        public string $titulo,
        public string $nome
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
