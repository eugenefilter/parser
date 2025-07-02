<?php

namespace App\Application\Commands;

use App\Domain\Properties\PropertyRepository;
use App\Infrastructure\Parsing\AlegriaParser;

class ParseAlegriaCommand
{
    public function __construct(
        private AlegriaParser $parser,
        private PropertyRepository $repository,
    ) {
    }

    public function __invoke(): void
    {
        foreach ($this->parser->parse() as $property) {
            $this->repository->store($property);
        }
    }
}
