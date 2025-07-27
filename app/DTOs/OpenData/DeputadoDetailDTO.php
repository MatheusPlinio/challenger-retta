<?php

namespace App\DTOs\OpenData;
class DeputadoDetailDTO
{
    /**
     * @param string[] $redeSocial
     */
    public function __construct(
        public readonly ?string $cpf,
        public readonly ?string $dataFalecimento,
        public readonly ?string $dataNascimento,
        public readonly ?string $escolaridade,
        public readonly int $id,
        public readonly ?string $municipioNascimento,
        public readonly ?string $nomeCivil,
        public readonly array $redeSocial,
        public readonly ?string $sexo,
        public readonly ?string $ufNascimento,
        public readonly UltimoStatusDTO $ultimoStatus,
        public readonly string $uri,
        public readonly ?string $urlWebsite
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            cpf: $data['cpf'] ?? null,
            dataFalecimento: $data['dataFalecimento'] ?? null,
            dataNascimento: $data['dataNascimento'] ?? null,
            escolaridade: $data['escolaridade'] ?? null,
            id: $data['id'],
            municipioNascimento: $data['municipioNascimento'] ?? null,
            nomeCivil: $data['nomeCivil'] ?? null,
            redeSocial: $data['redeSocial'] ?? [],
            sexo: $data['sexo'] ?? null,
            ufNascimento: $data['ufNascimento'] ?? null,
            ultimoStatus: UltimoStatusDTO::fromArray($data['ultimoStatus']),
            uri: $data['uri'],
            urlWebsite: $data['urlWebsite'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'cpf' => $this->cpf,
            'dataFalecimento' => $this->dataFalecimento,
            'dataNascimento' => $this->dataNascimento,
            'escolaridade' => $this->escolaridade,
            'id' => $this->id,
            'municipioNascimento' => $this->municipioNascimento,
            'nomeCivil' => $this->nomeCivil,
            'redeSocial' => $this->redeSocial,
            'sexo' => $this->sexo,
            'ufNascimento' => $this->ufNascimento,
            'ultimoStatus' => $this->ultimoStatus->toArray(),
            'uri' => $this->uri,
            'urlWebsite' => $this->urlWebsite
        ];
    }
}