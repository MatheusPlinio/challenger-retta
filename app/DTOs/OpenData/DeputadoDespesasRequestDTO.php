<?php

namespace App\DTOs\OpenData;

class DeputadoDespesasRequestDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?array $idLegislatura = null,
        public readonly ?array $ano = null,
        public readonly ?array $mes = null,
        public readonly ?string $cnpjCpfFornecedor = null,
        public readonly ?int $pagina = null,
        public readonly ?int $itens = null,
        public readonly ?string $ordem = 'ASC',
        public readonly ?string $ordenarPor = 'ano'
    ) {}

    public function toArray(): array
    {
        $data = [];

        if ($this->idLegislatura !== null) {
            $data['idLegislatura'] = implode(',', $this->idLegislatura);
        }

        if ($this->ano !== null) {
            $data['ano'] = implode(',', $this->ano);
        }

        if ($this->mes !== null) {
            $data['mes'] = implode(',', $this->mes);
        }

        if ($this->cnpjCpfFornecedor !== null) {
            $data['cnpjCpfFornecedor'] = $this->cnpjCpfFornecedor;
        }

        if ($this->pagina !== null) {
            $data['pagina'] = $this->pagina;
        }

        if ($this->itens !== null) {
            $data['itens'] = $this->itens;
        }

        if ($this->ordem !== null) {
            $data['ordem'] = $this->ordem;
        }

        if ($this->ordenarPor !== null) {
            $data['ordenarPor'] = $this->ordenarPor;
        }

        return $data;
    }
}