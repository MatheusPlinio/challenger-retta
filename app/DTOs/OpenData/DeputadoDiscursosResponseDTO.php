<?php

namespace App\DTOs\OpenData;
class DeputadoDiscursosResponseDTO
{
    public function __construct(
        public readonly array $dados,
        public readonly array $links
    ) {
    }

    public static function fromArray(array $data): self
    {
        $dados = array_map(
            fn($item) => DiscursoDTO::fromArray($item),
            $data['dados'] ?? []
        );

        $links = array_map(
            fn($item) => LinkDTO::fromArray($item),
            $data['links'] ?? []
        );

        return new self($dados, $links);
    }
}

