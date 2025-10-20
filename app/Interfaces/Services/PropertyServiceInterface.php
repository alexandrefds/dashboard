<?php

namespace App\Interfaces\Services;

interface PropertyServiceInterface
{
    public function createProperty(int $userId, array $data);
}
