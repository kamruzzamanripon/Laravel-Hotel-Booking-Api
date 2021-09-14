<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'checkInDate' => $this->faker->dateTime($max = 'now'),
            'checkOutDate' => $this->faker->dateTime($max = 'now'),
            'daysOfStay' => rand(2,7),
            'user_id' => User::all()->random()->id,
            'payment_id' => Payment::all()->random()->id,
        ];
    }
}
