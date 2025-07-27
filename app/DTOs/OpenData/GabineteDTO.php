<?php

namespace App\DTOs\OpenData;

class GabineteDTO
{
    public function __construct(
        public readonly ?string $andar,
        public readonly ?string $email,
        public readonly ?string $nome,
        public readonly ?string $predio,
        public readonly ?string $sala,
        public readonly ?string $telefone
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            andar: $data['andar'] ?? null,
            email: $data['email'] ?? null,
            nome: $data['nome'] ?? null,
            predio: $data['predio'] ?? null,
            sala: $data['sala'] ?? null,
            telefone: $data['telefone'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'andar' => $this->andar,
            'email' => $this->email,
            'nome' => $this->nome,
            'predio' => $this->predio,
            'sala' => $this->sala,
            'telefone' => $this->telefone
        ];
    }
}