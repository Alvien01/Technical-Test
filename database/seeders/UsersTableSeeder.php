<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('users')->insert([
            [
                'name' => 'Admin Demo',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('AdminPass123!'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Tukang Demo',
                'role' => 'tukang',
                'email' => 'tukang@gmail.com',
                'password' => Hash::make('TukangPass123!'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'User Demo',
                'role' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('UserPass123!'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Tukang Satu',
                'role' => 'tukang',
                'email' => 'tukang1@gmail.com',
                'password' => Hash::make('tukang001'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'User Satu',
                'role' => 'user',
                'email' => 'user1@example.com',
                'password' => Hash::make('user001'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
