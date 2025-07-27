<?php

namespace App\Jobs;

use App\DTOs\OpenData\DeputadoByIdRequestDTO;
use App\DTOs\OpenData\DeputadoDespesasRequestDTO;
use App\Models\Deputado;
use App\Services\Contracts\OpenDataInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchOthersDataDeputy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public DeputadoByIdRequestDTO $params)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(OpenDataInterface $openDataInterface): void
    {
        try {
            $pagina = 1;

            do {
                $requestDTO = new DeputadoDespesasRequestDTO(
                    id: $this->params->id,
                    pagina: $pagina,
                    itens: 100
                );

                $deputy_expense = $openDataInterface->getDeputadoDespesas($requestDTO);

                foreach ($deputy_expense->dados as $despesa) {
                    Deputado::find($this->params->id)
                        ->despesas()
                        ->updateOrCreate([
                            'codDocumento' => $despesa->codDocumento,
                            'numDocumento' => $despesa->numDocumento,
                            'parcela' => $despesa->parcela
                        ], [
                            "ano" => $despesa->ano,
                            "cnpjCpfFornecedor" => $despesa->cnpjCpfFornecedor,
                            "codLote" => $despesa->codLote,
                            "codTipoDocumento" => $despesa->codTipoDocumento,
                            "dataDocumento" => $despesa->dataDocumento,
                            "mes" => $despesa->mes,
                            "nomeFornecedor" => $despesa->nomeFornecedor,
                            "numRessarcimento" => $despesa->numRessarcimento,
                            "tipoDespesa" => $despesa->tipoDespesa,
                            "tipoDocumento" => $despesa->tipoDocumento,
                            "urlDocumento" => $despesa->urlDocumento,
                            "valorDocumento" => $despesa->valorDocumento,
                            "valorGlosa" => $despesa->valorGlosa,
                            "valorLiquido" => $despesa->valorLiquido
                        ]);
                }

                $pagina++;
            } while (count($deputy_expense->dados) > 0);

        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
