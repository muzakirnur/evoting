<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DashboardTableSeeder::class,
        ]);
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'pendidikan' => fake()->randomElement(['Sarjana', 'Magister', 'SMA', 'SMP']),
            'alamat' => fake()->address(),
            'tanggal_lahir' => fake()->dateTimeBetween(),
            'password' => Hash::make('password')
        ]);
    }
}
