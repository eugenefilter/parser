<?php

namespace App\Domain\Properties;

interface PropertyRepository
{
    public function store(Property $property): void;
}
