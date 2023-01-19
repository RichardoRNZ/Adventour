<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
        $restaurants = [
            ['name' => 'Restaurant A', 'country_id' => 2, 'city' => 'City A', 'description' => 'Lorem Ipsum.', 'image' => 'images/resto.jpg'],
            ['name' => 'Restaurant B', 'country_id' => 2, 'city' => 'City B', 'description' => 'Lorem Ipsum.', 'image' => 'images/resto.jpg'],
            ['name' => 'Restaurant C', 'country_id' => 3, 'city' => 'City AB', 'description' => 'Lorem Ipsum.', 'image' => 'images/resto.jpg'],
            ['name' => 'Restaurant D', 'country_id' => 2, 'city' => 'City A', 'description' => 'Lorem Ipsum.', 'image' => 'images/resto.jpg'],
            ['name' => 'Restaurant E', 'country_id' => 3, 'city' => 'City BC', 'description' => 'Lorem Ipsum.', 'image' => 'images/resto.jpg'],  
        ];
          
        foreach ($restaurants as $key => $value) {
            Restaurant::create($value);
        }
    }
}
