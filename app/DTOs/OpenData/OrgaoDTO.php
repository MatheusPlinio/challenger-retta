<?php

namespace App\DTOs\OpenData;

class OrgaoDTO
{
    public function __construct(
        public readonly string $apelido,
        public readonly int $codTipoOrgao,
        public readonly int $id,
        public readonly string $nome,
        public readonly string $nomePublicacao,
        public readonly string $nomeResumido,
        public readonly string $sigla,
        public readonly string $tipoOrgao,
        public readonly string $uri
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            apelido: $data['apelido'],
            codTipoOrgao: $data['codTipoOrgao'],
            id: $data['id'],
            nome: $data['nome'],
            nomePublicacao: $data['nomePublicacao'],
            nomeResumido: $data['nomeResumido'],
            sigla: $data['sigla'],
            tipoOrgao: $data['tipoOrgao'],
            uri: $data['uri']
        );
    }
}