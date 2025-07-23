<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Properties\Property;
use App\Domain\Properties\PropertyRepository;
use App\Models\Property as PropertyModel;

class EloquentPropertyRepository implements PropertyRepository
{
    public function store(Property $property): void
    {
        PropertyModel::create([
            'title' => $property->title,
            'price' => $property->price,
            'url' => $property->url,
            'photos' => $property->photos,
            'description' => $property->description,
        ]);
    }
}
