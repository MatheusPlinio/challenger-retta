<?php

namespace App\DTOs\OpenData;

class DeputadoByIdResponseDTO
{
    /**
     * @param LinkDTO[] $links
     */
    public function __construct(
        public readonly DeputadoDetailDTO $dados,
        public readonly array $links
    ) {
    }

    public static function fromArray(array $data): self
    {
        $dados = DeputadoDetailDTO::fromArray($data['dados']);

        $links = array_map(
            fn(array $link) => LinkDTO::fromArray($link),
            $data['links'] ?? []
        );

        return new self($dados, $links);
    }
}

class UltimoStatusDTO
{
    public function __construct(
        public readonly ?string $condicaoEleitoral,
        public readonly ?string $data,
        public readonly ?string $descricaoStatus,
        public readonly ?string $email,
        public readonly ?GabineteDTO $gabinete,
        public readonly int $id,
        public readonly int $idLegislatura,
        public readonly ?string $nome,
        public readonly ?string $nomeEleitoral,
        public readonly ?string $siglaPartido,
        public readonly ?string $siglaUf,
        public readonly ?string $situacao,
        public readonly string $uri,
        public readonly ?string $uriPartido,
        public readonly ?string $urlFoto
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            condicaoEleitoral: $data['condicaoEleitoral'] ?? null,
            data: $data['data'] ?? null,
            descricaoStatus: $data['descricaoStatus'] ?? null,
            email: $data['email'] ?? null,
            gabinete: isset($data['gabinete']) ? GabineteDTO::fromArray($data['gabinete']) : null,
            id: $data['id'],
            idLegislatura: $data['idLegislatura'],
            nome: $data['nome'] ?? null,
            nomeEleitoral: $data['nomeEleitoral'] ?? null,
            siglaPartido: $data['siglaPartido'] ?? null,
            siglaUf: $data['siglaUf'] ?? null,
            situacao: $data['situacao'] ?? null,
            uri: $data['uri'],
            uriPartido: $data['uriPartido'] ?? null,
            urlFoto: $data['urlFoto'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'condicaoEleitoral' => $this->condicaoEleitoral,
            'data' => $this->data,
            'descricaoStatus' => $this->descricaoStatus,
            'email' => $this->email,
            'gabinete' => $this->gabinete?->toArray(),
            'id' => $this->id,
            'idLegislatura' => $this->idLegislatura,
            'nome' => $this->nome,
            'nomeEleitoral' => $this->nomeEleitoral,
            'siglaPartido' => $this->siglaPartido,
            'siglaUf' => $this->siglaUf,
            'situacao' => $this->situacao,
            'uri' => $this->uri,
            'uriPartido' => $this->uriPartido,
            'urlFoto' => $this->urlFoto
        ];
    }
}