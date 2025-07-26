<?php

namespace App\Jobs;

use App\DTOs\OpenData\DeputadoByIdRequestDTO;
use App\Models\Deputado;
use App\Services\Contracts\OpenDataInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class FetchAndStoreDeputyData implements ShouldQueue
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
            $response = $openDataInterface->getDeputadoById(new DeputadoByIdRequestDTO($this->params->id));

            Deputado::updateOrCreate(
                ['id' => $this->params->id],
                [
                    'uri' => $response->dados->uri,
                    'nome' => $response->dados->nomeCivil,
                    'siglaPartido' => $response->dados->ultimoStatus->siglaPartido,
                    'uriPartido' => $response->dados->ultimoStatus->uriPartido,
                    'siglaUf' => $response->dados->ultimoStatus->siglaUf,
                    'idLegislatura' => $response->dados->ultimoStatus->idLegislatura,
                    'urlFoto' => $response->dados->ultimoStatus->urlFoto,
                    'email' => $response->dados->ultimoStatus->email,
                ]
            );
        } catch (\Throwable $e) {
            Log::error('Erro no FetchANdStoreDeputyData: ' . $e->getMessage());
            throw $e;
        }
    }
}
