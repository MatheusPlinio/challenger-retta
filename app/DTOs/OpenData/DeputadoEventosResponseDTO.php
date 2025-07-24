<?php

namespace App\DTOs\OpenData;

class DeputadoEventosResponseDTO
{
    /**
     * @param EventoDTO[] $dados
     */
    public function __construct(
        public readonly array $dados,
        public readonly array $links = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        $dados = array_map(fn(array $evento) => EventoDTO::fromArray($evento), $data['dados'] ?? []);
        return new self($dados, $data['links'] ?? []);
    }
}

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

namespace App\DTOs\OpenData;

class LocalCamaraDTO
{
    public function __construct(
        public readonly string $andar,
        public readonly string $nome,
        public readonly string $predio,
        public readonly string $sala
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            andar: $data['andar'],
            nome: $data['nome'],
            predio: $data['predio'],
            sala: $data['sala']
        );
    }
}

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
