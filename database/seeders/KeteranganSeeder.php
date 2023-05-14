<?php

namespace Database\Seeders;

use App\Models\Keterangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeteranganSeeder extends Seeder
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
                'keterangan_satu' => 'Balikpapan - Jakarta',
                'keterangan_dua' => '12:00',
            ],
            [
                'keterangan_satu' => 'Balikpapan - Bali',
                'keterangan_dua' => '09:00',
            ],
            [
                'keterangan_satu' => 'Balikpapan - Bali',
                'keterangan_dua' => '10:00',
            ],
            ['keterangan_satu' => 'Jl. Sultan Hasanuddin'],
            ['keterangan_satu' => 'Jl. Sultan Prabowo'],
            ['keterangan_satu' => 'Jl. Sultan Megawati']
        ];

        foreach ($data as $value) {
            Keterangan::create($value);
        }
    }
}