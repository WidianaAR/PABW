<?php

namespace Database\Seeders;

use App\Models\HotelPenerbangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelPenerbanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 3,
                'keterangan_id' => 1,
                'kategori' => 'Penerbangan',
                'nama' => 'Lion Air',
                'stok' => '30',
                'jumlah_terbooking' => '18',
                'harga' => '350000',
                'status' => 'Tersedia'
            ],
            [
                'user_id' => 3,
                'keterangan_id' => 2,
                'kategori' => 'Penerbangan',
                'nama' => 'Sriwijaya Air',
                'stok' => '40',
                'jumlah_terbooking' => '18',
                'harga' => '400000',
                'status' => 'Tersedia'
            ],
            [
                'user_id' => 3,
                'keterangan_id' => 3,
                'kategori' => 'Penerbangan',
                'nama' => 'Batik',
                'stok' => '40',
                'jumlah_terbooking' => '9',
                'harga' => '420000',
                'status' => 'Tersedia'
            ],
            [
                'user_id' => 3,
                'keterangan_id' => 4,
                'kategori' => 'Hotel',
                'nama' => 'Aston',
                'stok' => '30',
                'jumlah_terbooking' => '12',
                'harga' => '150000',
                'status' => 'Tersedia'
            ],
            [
                'user_id' => 3,
                'keterangan_id' => 5,
                'kategori' => 'Hotel',
                'nama' => 'Platinum',
                'stok' => '90',
                'jumlah_terbooking' => '89',
                'harga' => '180000',
                'status' => 'Tersedia'
            ],
            [
                'user_id' => 3,
                'keterangan_id' => 6,
                'kategori' => 'Hotel',
                'nama' => 'Grand City',
                'stok' => '100',
                'jumlah_terbooking' => '100',
                'harga' => '210000',
                'status' => 'Tidak tersedia'
            ],
        ];

        foreach ($data as $value) {
            HotelPenerbangan::create($value);
        }
    }
}