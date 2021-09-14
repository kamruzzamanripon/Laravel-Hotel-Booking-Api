<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating' => rand(1, 5),
            'comment' => $this->faker->text(100),
            'user_id' => User::all()->random()->id,
            'room_id' => Room::all()->random()->id,
        ];
    }
}
