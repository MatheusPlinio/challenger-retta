<?php

namespace App\DTOs\OpenData;

class FaseEventoDTO
{
    public function __construct(
        public readonly ?string $dataHoraFim,
        public readonly ?string $dataHoraInicio,
        public readonly ?string $titulo
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            dataHoraFim: $data['dataHoraFim'] ?? null,
            dataHoraInicio: $data['dataHoraInicio'] ?? null,
            titulo: $data['titulo'] ?? null
        );
    }
}