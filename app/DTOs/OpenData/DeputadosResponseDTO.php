<?php

namespace App\DTOs\OpenData;

class DeputadosResponseDTO
{
    /**
     * @param DeputadoDTO[] $dados
     */
    public function __construct(
        public readonly array $dados
    ) {
    }

    public static function fromArray(array $data): self
    {
        $dados = array_map(
            fn(array $deputado) => DeputadoDTO::fromArray($deputado),
            $data['dados'] ?? []
        );

        return new self($dados);
    }

    public function count(): int
    {
        return count($this->dados);
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->dados);
    }
}