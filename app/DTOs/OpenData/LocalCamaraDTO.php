<?php

namespace App\DTOs\OpenData;

class LocalCamaraDTO
{
    public function __construct(
        public readonly string $andar,
        public readonly string $nome,
        public readonly string $predio,
        public readonly string $sala
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            andar: $data['andar'],
            nome: $data['nome'],
            predio: $data['predio'],
            sala: $data['sala']
        );
    }
}