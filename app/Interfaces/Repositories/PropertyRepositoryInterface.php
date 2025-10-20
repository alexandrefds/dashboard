<?php

namespace App\Interfaces\Repositories;

interface PropertyRepositoryInterface
{
    public function store(array $data): void;
}
