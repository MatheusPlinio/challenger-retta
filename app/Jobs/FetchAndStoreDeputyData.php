<?php

namespace App\Jobs;

use App\DTOs\OpenData\DeputadoDTO;
use App\DTOs\OpenData\DeputadosResponseDTO;
use App\Models\Deputado;
use App\Repositories\Contracts\DeputadoRepositoryInterface;
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
    public function __construct(
        public DeputadosResponseDTO $deputies,
        protected DeputadoRepositoryInterface $deputyRepository
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->deputies->dados as $deputy) {
            try {
                $this->deputyRepository->storeOrUpdate($deputy);
            } catch (\Throwable $e) {
                Log::error('Erro no FetchANdStoreDeputyData: ' . $e->getMessage());
                throw $e;
            }
        }
    }
}
