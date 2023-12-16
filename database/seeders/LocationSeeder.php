<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'state' => 'SP',
            'city' => 'Caraguatatuba',
            'neighborhood' => 'Jardim Progresso',
            'postal_code' => '11674750',
            'street' => 'Rua Maria Augusta dos Anjos',
            'number' => '153',
        ]);

        Location::create([
            'state' => 'SP',
            'city' => 'Caraguatatuba',
            'neighborhood' => 'Martim de Sá',
            'postal_code' => '11662401',
            'street' => 'Praça Padre José Porfírio de Deus Filho',
            'number' => '623',
        ]);

        Location::create([
            'state' => 'SP',
            'city' => 'Caraguatatuba',
            'neighborhood' => 'Barranco Alto',
            'postal_code' => '11670402',
            'street' => 'Travessa Antônio Martins Filho',
            'number' => '523',
        ]);
    }
}
