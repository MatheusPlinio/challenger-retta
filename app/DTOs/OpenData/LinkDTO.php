<?php

namespace App\DTOs\OpenData;

class LinkDTO
{
    public function __construct(
        public readonly ?string $href,
        public readonly ?string $rel,
        public readonly ?string $type
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            href: $data['href'] ?? null,
            rel: $data['rel'] ?? null,
            type: $data['type'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'href' => $this->href,
            'rel' => $this->rel,
            'type' => $this->type
        ], fn($v) => !is_null($v));
    }
}