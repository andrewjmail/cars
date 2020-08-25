<?php

use Illuminate\Database\Seeder;
use App\Make;
use App\Model;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AudiMake = Make::where('name', 'Audi')->first();

        Model::create([
            'name' => 'TT',
            'make_id' => $AudiMake->id
        ]);

        Model::create([
            'name' => 'A4',
            'make_id' => $AudiMake->id
        ]);

        Model::create([
            'name' => 'E-tron',
            'make_id' => $AudiMake->id
        ]);

        $BmwMake = Make::where('name', 'BMW')->first();

        Model::create([
            'name' => 'X3',
            'make_id' => $BmwMake->id
        ]);

        Model::create([
            'name' => 'i3',
            'make_id' => $BmwMake->id
        ]);

        $VwMake = Make::where('name', 'VW')->first();

        Model::create([
            'name' => 'Golf',
            'make_id' => $VwMake->id
        ]);

        Model::create([
            'name' => 'Polo',
            'make_id' => $VwMake->id
        ]);
    }
}
