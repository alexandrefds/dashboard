<?php

namespace App\Services;

use App\Interfaces\Repositories\PropertyRepositoryInterface;
use App\Interfaces\Services\PropertyServiceInterface;

class PropertyService implements PropertyServiceInterface
{
    public function __construct(readonly private PropertyRepositoryInterface $propertyRepository)
    {
    }

    public function createProperty(int $userId, array $data)
    {
        $data['created_by'] = $userId;

        dd($data);
    }
}
