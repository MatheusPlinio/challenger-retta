<?php

namespace App\DTOs\OpenData;

class DeputadoDespesasResponseDTO
{
    /**
     * @param DespesaDTO[] $dados
     * @param LinkDTO[] $links
     */
    public function __construct(
        public readonly array $dados,
        public readonly array $links
    ) {
    }

    public static function fromArray(array $data): self
    {
        $dados = array_map(
            fn(array $despesa) => DespesaDTO::fromArray($despesa),
            $data['dados'] ?? []
        );

        $links = array_map(
            fn(array $link) => LinkDTO::fromArray($link),
            $data['links'] ?? []
        );

        return new self($dados, $links);
    }
}