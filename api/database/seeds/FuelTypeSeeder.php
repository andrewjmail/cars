<?php

use Illuminate\Database\Seeder;
use App\FuelType;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelType::create([
            'type' => 'Petrol'
        ]);

        FuelType::create([
            'type' => 'Diesel'
        ]);

        FuelType::create([
            'type' => 'Electric'
        ]);
    }
}
