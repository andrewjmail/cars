<?php

use Illuminate\Database\Seeder;
use App\Vehicle;
use App\Model;
use App\FuelType;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eTron = Model::where('name', 'E-Tron')->first();
        $a4 = Model::where('name', 'A4')->first();
        $tt = Model::where('name', 'TT')->first();

        $golf = Model::where('name', 'Golf')->first();
        $polo = Model::where('name', 'Polo')->first();
       
        $x3 = Model::where('name', 'X3')->first();
        $i3 = Model::where('name', 'I3')->first();

        $petrol = FuelType::where('type', 'Petrol')->first();
        $diesel = FuelType::where('type', 'Diesel')->first();
        $electric = FuelType::where('type', 'Electric')->first();


        Vehicle::create([
            'model_id' => $eTron->id,
            'fuel_type_id' => $electric->id
        ]);

        Vehicle::create([
            'model_id' => $a4->id,
            'fuel_type_id' => $petrol->id
        ]);

        Vehicle::create([
            'model_id' => $tt->id,
            'fuel_type_id' => $petrol->id
        ]);

        Vehicle::create([
            'model_id' => $a4->id,
            'fuel_type_id' => $diesel->id
        ]);

        Vehicle::create([
            'model_id' => $golf->id,
            'fuel_type_id' => $diesel->id
        ]);

        Vehicle::create([
            'model_id' => $golf->id,
            'fuel_type_id' => $electric->id
        ]);

        Vehicle::create([
            'model_id' => $polo->id,
            'fuel_type_id' => $petrol->id
        ]);

        Vehicle::create([
            'model_id' => $polo->id,
            'fuel_type_id' => $diesel->id
        ]);

        Vehicle::create([
            'model_id' => $x3->id,
            'fuel_type_id' => $diesel->id
        ]);

        Vehicle::create([
            'model_id' => $i3->id,
            'fuel_type_id' => $electric->id
        ]);

    }
}
