<?php

namespace App\Services\Contracts;

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

interface OpenDataInterface
{
    /**
     * Summary of getDeputados
     * @param DeputadosRequestDTO
     * @return DeputadosResponseDTO
     */
    public function getDeputados(DeputadosRequestDTO $params): DeputadosResponseDTO;

    /**
     * Summary of getDeputado
     * @param DeputadoByIdRequestDTO
     * @return DeputadoByIdResponseDTO
     */

    public function getDeputadoById(DeputadoByIdRequestDTO $params): DeputadoByIdResponseDTO;

    /**
     * Summary of getDeputadoDespesas
     * @param DeputadoDespesasRequestDTO
     * @return DeputadoDespesasResponseDTO
     */
    public function getDeputadoDespesas(DeputadoDespesasRequestDTO $params): DeputadoDespesasResponseDTO;

    /**
     * Summary of DeputadoDiscursos
     * @param DeputadoDiscursosRequestDTO
     * @return DeputadoDiscursosResponseDTO
     */
    public function getDeputadoDiscursos(DeputadoDiscursosRequestDTO $params): DeputadoDiscursosResponseDTO;

    /**
     * Summary of getDeputadoEventos
     * @param DeputadoEventosRequestDTO
     * @return DeputadoEventosResponseDTO
     */
    public function getDeputadoEventos(DeputadoEventosRequestDTO $params): DeputadoEventosResponseDTO;

    /**
     * Summary of getDeputadoFrentes
     * @param DeputadoFrentesRequestDTO
     * @return DeputadoFrentesResponseDTO
     */
    public function getDeputadoFrentes(DeputadoFrentesRequestDTO $params): DeputadoFrentesResponseDTO;

    /**
     * Summary of getDeputadoHistorico
     * @param DeputadoHistoricoRequestDTO
     * @return DeputadoHistoricoResponseDTO
     */

    public function getDeputadoHistorico(DeputadoHistoricoRequestDTO $params): DeputadoHistoricoResponseDTO;

    /**
     * Summary of getDeputadoMandatosExternos
     * @param DeputadoMandatosExternosRequestDTO
     * @return DeputadoMandatosExternosResponseDTO
     */

    public function getDeputadoMandatosExternos(DeputadoMandatosExternosRequestDTO $params): DeputadoMandatosExternosResponseDTO;

    /**
     * Summary of getDeputadoOcupacoes
     * @param DeputadoOcupacoesRequestDTO
     * @return DeputadoOcupacoesResponseDTO
     */
    public function getDeputadoOcupacoes(DeputadoOcupacoesRequestDTO $params): DeputadoOcupacoesResponseDTO;

    /**
     * Summary of getDeputadoOrgaos
     * @param DeputadoOrgaosRequestDTO
     * @return DeputadoOrgaosResponseDTO
     */
    public function getDeputadoOrgaos(DeputadoOrgaosRequestDTO $params): DeputadoOrgaosResponseDTO;

    /**
     * Summary of getDeputadoProfissoes
     * @param DeputadoProfissoesRequestDTO
     * @return DeputadoProfissoesResponseDTO
     */
    public function getDeputadoProfissoes(DeputadoProfissoesRequestDTO $params): DeputadoProfissoesResponseDTO;

    /**
     * Summary of getLegislaturaLideres
     * @param LegislaturaLideresRequestDTO
     * @return LegislaturaLideresResponseDTO
     */

    public function getLegislaturaLideres(LegislaturaLideresRequestDTO $params): LegislaturaLideresResponseDTO;

    /**
     * Summary of getLegislaturaMesas
     * @param LegislaturaMesasRequestDTO
     * @return LegislaturaMesasResponseDTO
     */
    public function getLegislaturaMesas(LegislaturaMesasRequestDTO $params): LegislaturaMesasResponseDTO;

    /**
     * Summary of referencias de deputados
     * @return ReferenciaDeputadoSituacaoResponseDTO
     */

    public function getReferenciasDeputados(): ReferenciaDeputadoSituacaoResponseDTO;
}