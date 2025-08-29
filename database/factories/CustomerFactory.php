<?php

namespace Prasso\AutoProHub\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Prasso\AutoProHub\Models\Customer;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zip' => $this->faker->postcode(),
            'status' => $this->faker->randomElement(['active', 'inactive', 'pending']),
        ];
    }
}
