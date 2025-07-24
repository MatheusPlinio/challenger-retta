<?php

namespace App\DTOs\OpenData;

class DeputadosResponseDTO
{
    /**
     * @param DeputadoDTO[] $dados
     */
    public function __construct(
        public readonly array $dados
    ) {
    }

    public static function fromArray(array $data): self
    {
        $dados = array_map(
            fn(array $deputado) => DeputadoDTO::fromArray($deputado),
            $data['dados'] ?? []
        );

        return new self($dados);
    }
}

class DeputadoDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $uri,
        public readonly string $nome,
        public readonly string $siglaPartido,
        public readonly string $uriPartido,
        public readonly string $siglaUf,
        public readonly int $idLegislatura,
        public readonly string $urlFoto,
        public readonly string $email
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            uri: $data['uri'],
            nome: $data['nome'],
            siglaPartido: $data['siglaPartido'],
            uriPartido: $data['uriPartido'],
            siglaUf: $data['siglaUf'],
            idLegislatura: $data['idLegislatura'],
            urlFoto: $data['urlFoto'],
            email: $data['email']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'uri' => $this->uri,
            'nome' => $this->nome,
            'siglaPartido' => $this->siglaPartido,
            'uriPartido' => $this->uriPartido,
            'siglaUf' => $this->siglaUf,
            'idLegislatura' => $this->idLegislatura,
            'urlFoto' => $this->urlFoto,
            'email' => $this->email
        ];
    }
}