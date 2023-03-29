<?php

namespace Database\Seeders;

use App\Models\KamarHotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KamarHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KamarHotel::create([
            "nama" => "Aston",
            "alamat" => "Jl. Sultan Hasanuddin",
            'jumlah_kamar' => '30',
            "kamar_terbooking" => '12',
            "kamar_tersedia" => "18"
        ]);

        KamarHotel::create([
            "nama" => "Platinum",
            "alamat" => "Jl. Sultan Prabowo",
            'jumlah_kamar' => '90',
            "kamar_terbooking" => '89',
            "kamar_tersedia" => "1"
        ]);

        KamarHotel::create([
            "nama" => "Grand City",
            "alamat" => "Jl. Sultan Megawati",
            'jumlah_kamar' => '100',
            "kamar_terbooking" => '100',
            "kamar_tersedia" => "0"
        ]);
    }
}
