<?php

namespace Database\Factories;

use App\Enums\PropertiesTypesEnum;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition(): array
    {
        $types = array_column(PropertiesTypesEnum::cases(), 'value');
        $user = User::factory(User::class)->make();

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'for_sale' => $this->faker->boolean(),
            'for_rent' => $this->faker->boolean(),
            'sale_price' => $this->faker->randomFloat(2, 50000, 1000000),
            'rent_price' => $this->faker->randomFloat(2, 1000, 10000),
            'condominium_price' => $this->faker->randomFloat(2, 100, 3000),
            'type' => $this->faker->randomElement($types),
            'active' => true,
            'created_by' => $user->id,
        ];
    }
}
