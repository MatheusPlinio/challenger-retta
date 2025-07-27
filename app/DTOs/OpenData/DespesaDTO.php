<?php

namespace App\DTOs\OpenData;

class DespesaDTO
{
    public function __construct(
        public readonly int $ano,
        public readonly ?string $cnpjCpfFornecedor,
        public readonly int $codDocumento,
        public readonly int $codLote,
        public readonly int $codTipoDocumento,
        public readonly ?string $dataDocumento,
        public readonly int $mes,
        public readonly ?string $nomeFornecedor,
        public readonly ?string $numDocumento,
        public readonly ?string $numRessarcimento,
        public readonly int $parcela,
        public readonly ?string $tipoDespesa,
        public readonly ?string $tipoDocumento,
        public readonly ?string $urlDocumento,
        public readonly float $valorDocumento,
        public readonly float $valorGlosa,
        public readonly float $valorLiquido
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            ano: $data['ano'],
            cnpjCpfFornecedor: $data['cnpjCpfFornecedor'] ?? null,
            codDocumento: $data['codDocumento'],
            codLote: $data['codLote'],
            codTipoDocumento: $data['codTipoDocumento'],
            dataDocumento: $data['dataDocumento'] ?? null,
            mes: $data['mes'],
            nomeFornecedor: $data['nomeFornecedor'] ?? null,
            numDocumento: $data['numDocumento'] ?? null,
            numRessarcimento: $data['numRessarcimento'] ?? null,
            parcela: $data['parcela'],
            tipoDespesa: $data['tipoDespesa'] ?? null,
            tipoDocumento: $data['tipoDocumento'] ?? null,
            urlDocumento: $data['urlDocumento'] ?? null,
            valorDocumento: (float) $data['valorDocumento'],
            valorGlosa: (float) $data['valorGlosa'],
            valorLiquido: (float) $data['valorLiquido']
        );
    }

    public function toArray(): array
    {
        return [
            'ano' => $this->ano,
            'cnpjCpfFornecedor' => $this->cnpjCpfFornecedor,
            'codDocumento' => $this->codDocumento,
            'codLote' => $this->codLote,
            'codTipoDocumento' => $this->codTipoDocumento,
            'dataDocumento' => $this->dataDocumento,
            'mes' => $this->mes,
            'nomeFornecedor' => $this->nomeFornecedor,
            'numDocumento' => $this->numDocumento,
            'numRessarcimento' => $this->numRessarcimento,
            'parcela' => $this->parcela,
            'tipoDespesa' => $this->tipoDespesa,
            'tipoDocumento' => $this->tipoDocumento,
            'urlDocumento' => $this->urlDocumento,
            'valorDocumento' => $this->valorDocumento,
            'valorGlosa' => $this->valorGlosa,
            'valorLiquido' => $this->valorLiquido
        ];
    }
}