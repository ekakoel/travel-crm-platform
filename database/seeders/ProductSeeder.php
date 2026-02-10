<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\HotelRoom;
use App\Models\Product;
use App\Models\Rate;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $hotel = Hotel::create([
            'name' => 'Luxury Bali Resort',
            'city' => 'Bali',
            'country' => 'Indonesia',
        ]);

        $room = HotelRoom::create([
            'hotel_id' => $hotel->id,
            'room_type' => 'Deluxe Ocean View',
            'max_pax' => 2,
        ]);

        Rate::create([
            'rateable_id' => $room->id,
            'rateable_type' => HotelRoom::class,
            'net_price' => 120,
            'publish_price' => 180,
            'currency' => 'USD',
            'start_date' => now(),
            'end_date' => now()->addYear(),
        ]);

        $tour = Product::create([
            'type' => 'tour',
            'name' => 'Ubud Cultural Tour',
            'description' => 'Full day private tour',
        ]);

        Rate::create([
            'rateable_id' => $tour->id,
            'rateable_type' => Product::class,
            'net_price' => 50,
            'publish_price' => 80,
            'currency' => 'USD',
            'start_date' => now(),
            'end_date' => now()->addYear(),
        ]);
    }
}

