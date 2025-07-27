<?php

namespace App\Repositories\Contracts;

use App\DTOs\OpenData\DeputadoDTO;

interface DeputadoRepositoryInterface
{
    public function storeOrUpdate(DeputadoDTO $deputy);
}