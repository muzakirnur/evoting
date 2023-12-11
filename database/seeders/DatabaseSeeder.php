<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(1000)->create();
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'pendidikan' => fake()->randomElement(['Sarjana', 'Magister', 'SMA', 'SMP']),
            'alamat' => fake()->address(),
            'tanggal_lahir' => fake()->dateTimeBetween(),
            'is_admin' => true,
            'password' => Hash::make('password')
        ]);
    }
}
