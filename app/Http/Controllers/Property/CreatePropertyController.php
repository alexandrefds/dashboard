<?php

namespace App\Http\Controllers\Property;

use App\Enums\HttpStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePropertyRequest;
use App\Interfaces\Services\PropertyServiceInterface;
use Exception;
use Illuminate\Http\Request;

class CreatePropertyController extends Controller
{
    public function __construct(readonly private PropertyServiceInterface $propertyService)
    {
    }

    public function __invoke(CreatePropertyRequest $request)
    {
        try {
            $userId = 1;
            $data = $request->validated();

            $this->propertyService->createProperty($userId, $data);

            return response()->json([
                'message' => 'Property created successfully.',
            ], HttpStatusEnum::CREATED);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Related record not found.',
                'details' => $e->getMessage(),
            ], HttpStatusEnum::NOT_FOUND);
        }
    }
}
