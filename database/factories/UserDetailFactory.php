<?php

namespace Database\Factories;

use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class UserDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $citizenship_country_id = [
            5,
            10,
            15,
            20,
        ];

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'user_id' => $this->faker->unique()->numberBetween(1,100),
            'citizenship_country_id' => Arr::random($citizenship_country_id),
        ];
    }
}
