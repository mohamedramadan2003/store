<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{

    public function definition(): array
    {
        return [
            'email'=>$this->faker->unique()->safeEmail ,
            'name'=>$this->faker->name ,
            'username' => $this->faker->unique()->userName ,
            'password' => Hash::make('password'),
            'phone_number'=>$this->faker->phoneNumber ,
            'super_admin' => $this->faker->boolean(),
        ];
    }
}
