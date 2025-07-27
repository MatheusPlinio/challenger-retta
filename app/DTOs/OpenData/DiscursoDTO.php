<?php

namespace App\DTOs\OpenData;

class DiscursoDTO
{
    public function __construct(
        public readonly ?string $dataHoraFim,
        public readonly ?string $dataHoraInicio,
        public readonly ?FaseEventoDTO $faseEvento,
        public readonly ?string $keywords,
        public readonly ?string $sumario,
        public readonly ?string $tipoDiscurso,
        public readonly ?string $transcricao,
        public readonly ?string $uriEvento,
        public readonly ?string $urlAudio,
        public readonly ?string $urlTexto,
        public readonly ?string $urlVideo
    ) {
    }

    public static function fromArray(array $data): self
    {
        $faseEvento = isset($data['faseEvento'])
            ? FaseEventoDTO::fromArray($data['faseEvento'])
            : null;

        return new self(
            dataHoraFim: $data['dataHoraFim'] ?? null,
            dataHoraInicio: $data['dataHoraInicio'] ?? null,
            faseEvento: $faseEvento,
            keywords: $data['keywords'] ?? null,
            sumario: $data['sumario'] ?? null,
            tipoDiscurso: $data['tipoDiscurso'] ?? null,
            transcricao: $data['transcricao'] ?? null,
            uriEvento: $data['uriEvento'] ?? null,
            urlAudio: $data['urlAudio'] ?? null,
            urlTexto: $data['urlTexto'] ?? null,
            urlVideo: $data['urlVideo'] ?? null
        );
    }
}