<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DummyUser>
 */
class DummyUserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => 6377716151,
            'password' => static::$password ??= Hash::make('password'),
            'status'   => 0,
            'device_token' => 'dOR_ZY8tTw-j6c8Qf6LDZ8:APA91bHcZByeeZ5KSnstn0XhCZLUcerDeoLCxT52Mgdvm8euoJMrPQICzlhZM2PR8KBIAGg82y3bVp2EnGk4GUCtgyFplwe-lvNppXva4u4mwL92fGrcwm4kW_ugclxtN48bvNbXBg6p'
        ];
    }
}
