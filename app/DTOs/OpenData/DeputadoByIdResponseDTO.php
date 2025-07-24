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

class GabineteDTO
{
    public function __construct(
        public readonly ?string $andar,
        public readonly ?string $email,
        public readonly ?string $nome,
        public readonly ?string $predio,
        public readonly ?string $sala,
        public readonly ?string $telefone
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            andar: $data['andar'] ?? null,
            email: $data['email'] ?? null,
            nome: $data['nome'] ?? null,
            predio: $data['predio'] ?? null,
            sala: $data['sala'] ?? null,
            telefone: $data['telefone'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'andar' => $this->andar,
            'email' => $this->email,
            'nome' => $this->nome,
            'predio' => $this->predio,
            'sala' => $this->sala,
            'telefone' => $this->telefone
        ];
    }
}

class LinkDTO
{
    public function __construct(
        public readonly string $href,
        public readonly string $rel,
        public readonly string $type
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            href: $data['href'],
            rel: $data['rel'],
            type: $data['type']
        );
    }

    public function toArray(): array
    {
        return [
            'href' => $this->href,
            'rel' => $this->rel,
            'type' => $this->type
        ];
    }
}