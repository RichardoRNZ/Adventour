<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tours = [
           ['name' => 'Tour Pack A', 'country_id' => 2, 'hotel_id' => 1, 'restaurant_id' => 1, 'description' => 'Lorem Ipsum.', 'price' => 3500000, 'image' => 'images/toursample.jpg'], 
           ['name' => 'Tour Pack B', 'country_id' => 2, 'hotel_id' => 1, 'restaurant_id' => 2, 'description' => 'Lorem Ipsum.', 'price' => 2550000, 'image' => 'images/toursample.jpg'], 
           ['name' => 'Tour Pack C', 'country_id' => 3, 'hotel_id' => 3, 'restaurant_id' => 3, 'description' => 'Lorem Ipsum.', 'price' => 1000000, 'image' => 'images/toursample.jpg'], 
           ['name' => 'Tour Pack D', 'country_id' => 3, 'hotel_id' => 5, 'restaurant_id' => 5, 'description' => 'Lorem Ipsum.', 'price' => 5000000, 'image' => 'images/toursample.jpg'], 
        ];

        foreach ($tours as $key => $value) {
            Tour::create($value);
        }
    }
}
