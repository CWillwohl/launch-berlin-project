<?php

namespace Database\Seeders;

use App\Models\Lock;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lock::create([
            'hash' => '36585215245785952545',
            'user_id' => 1,
            'status' => 0,
            'location_id' => 1,
            'status_changed_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
