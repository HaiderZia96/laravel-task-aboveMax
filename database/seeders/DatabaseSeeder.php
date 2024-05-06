<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();

            User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@admin.com',
             'password'=>bcrypt('password'),
             'email_verified_at'  => Carbon::now()->toDateTimeString(),
         ]);
    }
}
