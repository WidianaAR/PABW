<?php

namespace Database\Seeders;

use App\Models\SuntingPengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuntingPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuntingPengguna::create([
            "email" => "sudirman@gmail.com",
            "password"  => "12345",
            "saldo" => "500.000"
        ]);
        SuntingPengguna::create([
            "email" => "sudirman@gmail.com",
            "password"  => "12345",
            "saldo" => "500.000"
        ]);
        SuntingPengguna::create([
            "email" => "sudirman@gmail.com",
            "password"  => "12345",
            "saldo" => "500.000"
        ]);
    }
}
