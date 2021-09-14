<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_type' => "Stripe",
            'amount' => rand(500, 900),
            'transaction_id' => rand(125456589, 65847412),
            'paid_at' => $this->faker->dateTime(),
        ];
    }
}
