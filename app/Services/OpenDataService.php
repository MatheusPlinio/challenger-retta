<?php

namespace App\Services;

use App\DTOs\OpenData\DeputadoByIdRequestDTO;
use App\DTOs\OpenData\DeputadoByIdResponseDTO;
use App\DTOs\OpenData\DeputadoDespesasRequestDTO;
use App\DTOs\OpenData\DeputadoDespesasResponseDTO;
use App\DTOs\OpenData\DeputadoDiscursosRequestDTO;
use App\DTOs\OpenData\DeputadoDiscursosResponseDTO;
use App\DTOs\OpenData\DeputadoEventosRequestDTO;
use App\DTOs\OpenData\DeputadoEventosResponseDTO;
use App\DTOs\OpenData\DeputadoFrentesRequestDTO;
use App\DTOs\OpenData\DeputadoFrentesResponseDTO;
use App\DTOs\OpenData\DeputadoHistoricoRequestDTO;
use App\DTOs\OpenData\DeputadoHistoricoResponseDTO;
use App\DTOs\OpenData\DeputadoMandatosExternosRequestDTO;
use App\DTOs\OpenData\DeputadoMandatosExternosResponseDTO;
use App\DTOs\OpenData\DeputadoOcupacoesRequestDTO;
use App\DTOs\OpenData\DeputadoOcupacoesResponseDTO;
use App\DTOs\OpenData\DeputadoOrgaosRequestDTO;
use App\DTOs\OpenData\DeputadoOrgaosResponseDTO;
use App\DTOs\OpenData\DeputadoProfissoesRequestDTO;
use App\DTOs\OpenData\DeputadoProfissoesResponseDTO;
use App\DTOs\OpenData\DeputadosRequestDTO;
use App\DTOs\OpenData\DeputadosResponseDTO;
use App\DTOs\OpenData\LegislaturaLideresRequestDTO;
use App\DTOs\OpenData\LegislaturaLideresResponseDTO;
use App\DTOs\OpenData\LegislaturaMesasRequestDTO;
use App\DTOs\OpenData\LegislaturaMesasResponseDTO;
use App\DTOs\OpenData\ReferenciaDeputadoSituacaoResponseDTO;
use App\Services\Contracts\OpenDataInterface;
use Http;
use Illuminate\Http\Client\PendingRequest;

class OpenDataService implements OpenDataInterface
{
    private PendingRequest $client;

    public function __construct(private readonly Http $http)
    {
        $this->client = $http::withHeaders([
            'Accept' => 'application/json',
        ])->baseUrl(config('services.OpenData.url'));
    }

    public function getDeputados(DeputadosRequestDTO $params): DeputadosResponseDTO
    {
        $response = $this->client->get('/deputados', $params->toArray());

        return DeputadosResponseDTO::fromArray($response->json());
    }

    public function getDeputadoById(DeputadoByIdRequestDTO $params): DeputadoByIdResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}");

        return DeputadoByIdResponseDTO::fromArray($response->json());
    }

    public function getDeputadoDespesas(DeputadoDespesasRequestDTO $params): DeputadoDespesasResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/despesas", $params->toArray());
        return DeputadoDespesasResponseDTO::fromArray($response->json());
    }

    public function getDeputadoDiscursos(DeputadoDiscursosRequestDTO $params): DeputadoDiscursosResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/discursos", ['query' => $params]);
        return $response->json();
    }

    public function getDeputadoEventos(DeputadoEventosRequestDTO $params): DeputadoEventosResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/eventos", ['query' => $params]);
        return $response->json();
    }

    public function getDeputadoFrentes(DeputadoFrentesRequestDTO $params): DeputadoFrentesResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/frentes", ['query' => $params]);
        return $response->json();
    }

    public function getDeputadoHistorico(DeputadoHistoricoRequestDTO $params): DeputadoHistoricoResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/historico", ['query' => $params]);
        return $response->json();
    }

    public function getDeputadoMandatosExternos(DeputadoMandatosExternosRequestDTO $params): DeputadoMandatosExternosResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/mandatosExternos", ['query' => $params]);
        return $response->json();
    }

    public function getDeputadoOcupacoes(DeputadoOcupacoesRequestDTO $params): DeputadoOcupacoesResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/ocupacoes", ['query' => $params]);
        return $response->json();
    }

    public function getDeputadoOrgaos(DeputadoOrgaosRequestDTO $params): DeputadoOrgaosResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/orgaos", ['query' => $params]);
        return $response->json();
    }

    public function getDeputadoProfissoes(DeputadoProfissoesRequestDTO $params): DeputadoProfissoesResponseDTO
    {
        $response = $this->client->get("/deputados/{$params->id}/profissoes", ['query' => $params]);
        return $response->json();
    }

    public function getLegislaturaLideres(LegislaturaLideresRequestDTO $params): LegislaturaLideresResponseDTO
    {
        $response = $this->client->get("/legislaturas/{$params->id}/lideres", ['query' => $params]);
        return $response->json();
    }

    public function getLegislaturaMesas(LegislaturaMesasRequestDTO $params): LegislaturaMesasResponseDTO
    {
        $response = $this->client->get("/legislaturas/{$params->id}/mesas", ['query' => $params]);
        return $response->json();
    }

    public function getReferenciasDeputados(): ReferenciaDeputadoSituacaoResponseDTO
    {
        $response = $this->client->get("/referencias/deputados/situacoes");
        return $response->json();
    }
}