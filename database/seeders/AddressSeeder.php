<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'user_id' => 1,
            'city' => 'Caraguatatuba',
            'neighborhood' => 'Balneário Copacabana',
            'postal_code' => '11676-430',
        ]);
    }
}
