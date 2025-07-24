<?php

namespace App\DTOs\OpenData;

class DeputadoEventosRequestDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?int $pagina = null,
        public readonly ?int $itens = null,
        public readonly ?string $ordem = 'ASC',
        public readonly ?string $ordenarPor = 'dataHoraInicio'
    ) {}

    public function toArray(): array
    {
        $query = [];

        if ($this->pagina !== null) {
            $query['pagina'] = $this->pagina;
        }

        if ($this->itens !== null) {
            $query['itens'] = $this->itens;
        }

        if ($this->ordem !== null) {
            $query['ordem'] = $this->ordem;
        }

        if ($this->ordenarPor !== null) {
            $query['ordenarPor'] = $this->ordenarPor;
        }

        return $query;
    }
}
