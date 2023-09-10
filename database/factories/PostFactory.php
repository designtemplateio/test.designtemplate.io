<?php
  
namespace Database\Factories;
  
use Illuminate\Database\Eloquent\Factories\Factory;
use Fickrr\Models\Items;
use Illuminate\Support\Str;
  
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Ficker\Models\Items>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Items::class;
    /**
     * Define the model's default state.
     *
     * @return array

     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'slug' => Str::slug($this->faker->text()),
            'body' => $this->faker->paragraph()
        ];
    }
}