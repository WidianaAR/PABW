<?php

namespace Database\Seeders;

use App\Models\TiketPenerbangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiketPenerbanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiketPenerbangan::create([
            "nama" => "Lion Air",
            "tujuan" => "Balikpapan - Jakarta",
            'waktu' => '12.00',
            "jumlah_kursi" => '30',
            "kursi_terbooking" => "18",
            "kursi_tersedia" => "12"
        ]);

        TiketPenerbangan::create([
            "nama" => "Sriwijaya Air",
            "tujuan" => "Balikpapan - Bali",
            'waktu' => '09.00',
            "jumlah_kursi" => '40',
            "kursi_terbooking" => "18",
            "kursi_tersedia" => "22"
        ]);

        TiketPenerbangan::create([
            "nama" => "Batik",
            "tujuan" => "Balikpapan - Bali",
            'waktu' => '10.00',
            "jumlah_kursi" => '40',
            "kursi_terbooking" => "9",
            "kursi_tersedia" => "31"
        ]);
    }
}
