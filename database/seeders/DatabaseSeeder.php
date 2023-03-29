<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role_name' => 'Admin'], 
            ['role_name' => 'Pengguna'],
            ['role_name' => 'Mitra']
        ];

        foreach ($roles as $value) {
            Role::create($value);
        }

        $users = [
            [
                'role_id'=>1,
                'name'=>'ini akun Admin',
                'email'=>'admin@gmail.com',
                'password'=> bcrypt('12345'),
                'saldo_emoney' => 50000,
            ],
            [
                'role_id'=>2,
                'name'=>'ini akun Pengguna',
                'email'=>'pengguna@gmail.com',
                'password'=> bcrypt('12345'),
                'saldo_emoney' => 50000,
            ],
            [
                'role_id'=>3,
                'name'=>'ini akun Mitra',
                'email'=>'mitra@gmail.com',
                'password'=> bcrypt('12345'),
                'saldo_emoney' => 50000,
            ]
        ];

        foreach ($users as $value) {
            User::create($value);
        }

        $this->call(KamarHotelSeeder::class);
        $this->call(TiketPenerbanganSeeder::class);
    }
}
