<?php

namespace App\DTOs\OpenData;

class DeputadoEventosResponseDTO
{
    /**
     * @param EventoDTO[] $dados
     */
    public function __construct(
        public readonly array $dados,
        public readonly array $links = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        $dados = array_map(fn(array $evento) => EventoDTO::fromArray($evento), $data['dados'] ?? []);
        return new self($dados, $data['links'] ?? []);
    }
}
