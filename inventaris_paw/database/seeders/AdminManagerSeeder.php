<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $admin = User::where('email', 'admin@inventaris.com')->first();
        if (!$admin) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@inventaris.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
            $this->command->info('Admin user created: admin@inventaris.com / admin123');
        } else {
            $this->command->info('Admin user already exists');
        }

        // Cek apakah manajer sudah ada
        $manager = User::where('email', 'manajer@inventaris.com')->first();
        if (!$manager) {
            User::create([
                'name' => 'Manajer',
                'email' => 'manajer@inventaris.com',
                'password' => Hash::make('manajer123'),
                'role' => 'manajer',
                'email_verified_at' => now(),
            ]);
            $this->command->info('Manager user created: manajer@inventaris.com / manajer123');
        } else {
            $this->command->info('Manager user already exists');
        }
    }
}
