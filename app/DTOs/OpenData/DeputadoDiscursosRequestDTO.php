<?php

class DeputadoDiscursosRequestDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?array $idLegislatura = null,
        public readonly ?string $dataInicio = null,
        public readonly ?string $dataFim = null,
        public readonly string $ordenarPor = 'dataHoraInicio',
        public readonly string $ordem = 'DESC',
        public readonly ?int $itens = null,
        public readonly int $pagina = 1
    ) {
    }

    public function toArray(): array
    {
        $params = [];

        if ($this->idLegislatura !== null) {
            $params['idLegislatura'] = implode(',', $this->idLegislatura);
        }

        if ($this->dataInicio !== null) {
            $params['dataInicio'] = $this->dataInicio;
        }

        if ($this->dataFim !== null) {
            $params['dataFim'] = $this->dataFim;
        }

        $params['ordenarPor'] = $this->ordenarPor;
        $params['ordem'] = $this->ordem;

        if ($this->itens !== null) {
            $params['itens'] = $this->itens;
        }

        $params['pagina'] = $this->pagina;

        return $params;
    }
}