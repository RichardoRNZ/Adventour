<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tourdetail;

class TourdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tourdetails = [
           ['name' => 'Place A', 'tour_id' => 1, 'description' => 'Lorem Ipsum.', 'image' => 'images/japan-1.jpg'], 
           ['name' => 'Place B', 'tour_id' => 1, 'description' => 'Lorem Ipsum.', 'image' => 'images/japan-2.jpg'], 
           ['name' => 'Place C', 'tour_id' => 1, 'description' => 'Lorem Ipsum.', 'image' => 'images/japan-3.jpg'],
           ['name' => 'Place A', 'tour_id' => 2, 'description' => 'Lorem Ipsum.', 'image' => 'images/kyoto-1.jpg'],
           ['name' => 'Place B', 'tour_id' => 2, 'description' => 'Lorem Ipsum.', 'image' => 'images/kyoto-1.jpg'],
        ];

        foreach ($tourdetails as $key => $value) {
            Tourdetail::create($value);
        }
    }
}
