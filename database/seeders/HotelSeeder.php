<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
        $hotels = [
            ['name' => 'Hotel A', 'country_id' => 2, 'city' => 'City A', 'description' => 'Lorem Ipsum.', 'image' => 'images/hotel.jpg'],
            ['name' => 'Hotel B', 'country_id' => 2, 'city' => 'City B', 'description' => 'Lorem Ipsum.', 'image' => 'images/hotel.jpg'],
            ['name' => 'Hotel C', 'country_id' => 3, 'city' => 'City AB', 'description' => 'Lorem Ipsum.', 'image' => 'images/hotel.jpg'],
            ['name' => 'Hotel D', 'country_id' => 2, 'city' => 'City AC', 'description' => 'Lorem Ipsum.', 'image' => 'images/hotel.jpg'],
            ['name' => 'Hotel E', 'country_id' => 3, 'city' => 'City BC', 'description' => 'Lorem Ipsum.', 'image' => 'images/hotel.jpg'],
        ];
          
        foreach ($hotels as $key => $value) {
            Hotel::create($value);
        }
    }
}
