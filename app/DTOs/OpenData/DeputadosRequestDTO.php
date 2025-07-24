<?php

namespace App\DTOs\OpenData;

class DeputadosRequestDTO
{
    public function __construct(
        public readonly ?array $id = null,
        public readonly ?string $nome = null,
        public readonly ?array $idLegislatura = null,
        public readonly ?array $siglaUf = null,
        public readonly ?array $siglaPartido = null,
        public readonly ?string $siglaSexo = null,
        public readonly ?int $pagina = null,
        public readonly ?int $itens = null,
        public readonly ?string $dataInicio = null,
        public readonly ?string $dataFim = null,
        public readonly ?string $ordem = 'ASC',
        public readonly ?string $ordenarPor = 'nome'
    ) {
    }

    public function toArray(): array
    {
        $data = [];

        if ($this->id !== null) {
            $data['id'] = implode(',', $this->id);
        }

        if ($this->nome !== null) {
            $data['nome'] = $this->nome;
        }

        if ($this->idLegislatura !== null) {
            $data['idLegislatura'] = implode(',', $this->idLegislatura);
        }

        if ($this->siglaUf !== null) {
            $data['siglaUf'] = implode(',', $this->siglaUf);
        }

        if ($this->siglaPartido !== null) {
            $data['siglaPartido'] = implode(',', $this->siglaPartido);
        }

        if ($this->siglaSexo !== null) {
            $data['siglaSexo'] = $this->siglaSexo;
        }

        if ($this->pagina !== null) {
            $data['pagina'] = $this->pagina;
        }

        if ($this->itens !== null) {
            $data['itens'] = $this->itens;
        }

        if ($this->dataInicio !== null) {
            $data['dataInicio'] = $this->dataInicio;
        }

        if ($this->dataFim !== null) {
            $data['dataFim'] = $this->dataFim;
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