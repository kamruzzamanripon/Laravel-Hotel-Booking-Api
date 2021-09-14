<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;


class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_name' => $this->faker->name(),
            'pricePerNight' =>  rand(200, 900),
            'description' => $this->faker->text(100),
            'address' => $this->faker->text(50),
            'guestCapacity' =>  rand(1, 9),
            'numOfBeds' =>  rand(1, 9),
            'internet' => $this->faker->boolean(),
            'breakfast' => $this->faker->boolean(),
            'airConditioned' => $this->faker->boolean(),
            'petsAllowed' => $this->faker->boolean(),
            'roomCleaning' => $this->faker->boolean(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'category_id' => Category::all()->random()->id,
           
           
        ];
    }
}
