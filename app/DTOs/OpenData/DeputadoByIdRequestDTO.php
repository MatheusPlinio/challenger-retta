<?php

namespace App\DTOs\OpenData;

class DeputadoByIdRequestDTO
{
    public function __construct(
        public readonly int $id
    ) {}
}