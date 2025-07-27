<?php

namespace App\DTOs\OpenData;
class EventoDTO
{
    public function __construct(
        public readonly string $dataHoraInicio,
        public readonly string $dataHoraFim,
        public readonly string $descricao,
        public readonly string $descricaoTipo,
        public readonly int $id,
        public readonly ?LocalCamaraDTO $localCamara,
        public readonly ?string $localExterno,
        public readonly array $orgaos,
        public readonly string $situacao,
        public readonly string $uri,
        public readonly string $urlRegistro
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            dataHoraInicio: $data['dataHoraInicio'],
            dataHoraFim: $data['dataHoraFim'],
            descricao: $data['descricao'],
            descricaoTipo: $data['descricaoTipo'],
            id: $data['id'],
            localCamara: isset($data['localCamara']) ? LocalCamaraDTO::fromArray($data['localCamara']) : null,
            localExterno: $data['localExterno'] ?? null,
            orgaos: array_map(fn(array $orgao) => OrgaoDTO::fromArray($orgao), $data['orgaos'] ?? []),
            situacao: $data['situacao'],
            uri: $data['uri'],
            urlRegistro: $data['urlRegistro']
        );
    }
}