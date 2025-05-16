<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\String\ByteString;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        //tes user
        User::factory()->create([
            'name' => 'Gornal',
            'email' => 'test@gmail.com',
            'username' => 'gornal641',
            'password' => bcrypt('password'),
            'gender' => 'male',
            'phone' => '085741234567',
            'is_admin' => true,
            'religion' => 'Katolik',
            'marital_status' => 'single',
            'nik' => random_int(1000000000000, 9999999999999),
            'place_of_birth' => 'Semarang',
            'date_of_birth' => now()->subYears(20)->format('Y-m-d'),
            'address' => 'Jl, nama no. 123, Semarang',
            'job' => 'PNS',
            'blood_type' => 'A'
        ]);
    }
}
