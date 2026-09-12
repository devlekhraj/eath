<?php

namespace Database\Seeders;

use Admin\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::query()->firstOrCreate(
            ['username' => 'admin'],
            [
                'fname' => 'System',
                'lname' => 'Admin',
                'code' => 'AD0001',
                'email' => 'admin@example.test',
                'mobile_no' => null,
                'dob' => '1990-01-01',
                'joined_date' => now()->toDateString(),
                'password' => 'password',
                'is_active' => true,
                'status' => Admin::STATUS_ACTIVE,
                'email_verified_at' => now(),
            ]
        );
    }
}
