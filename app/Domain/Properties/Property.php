<?php

namespace App\Domain\Properties;

class Property
{
    public function __construct(
        public string $title,
        public string $price,
        public string $url,
        public array $photos = [],
        public ?string $description = null
    ) {
    }
}
