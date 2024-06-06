<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Domain\Core\Models\User;
use App\Domain\Core\Services\RolesAndPermissions\RolesEnum;
use App\Domain\Core\Services\RolesAndPermissions\RolesSeeder;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);

        $this->setupUsers();
    }


    private function setupUsers()
    {
        User::updateOrCreate(['email' => 'admin@admin.com'], [
            'phone'     => '+21000000000',
            'name'     => 'Administrator',
            'password' => Hash::make('123456'),
            'email_verified_at' => Carbon::now(),
        ])->assignRole(RolesEnum::super()->value);
        echo 'Admins Created Successfully' . PHP_EOL;
        
    }
}
