<?php

namespace App\Domain\Core\database\seeders;

use App\Domain\Core\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path('seeder/dummy_data.json'));
        $data = json_decode($json, true);



        // Chunk size
        $chunkSize = 1000;

        // Prepare the data for insertion
        $preparedData = [];
        foreach ($data as $row) {
            $preparedData[] = [
                'data' => json_encode($row),
                'attribute_type' => 'client_attributes',
                'changeable_type' => 'App\\Domain\\Station\\Models\\Monitor',
                'changeable_id' => 2 ,
                'device_id' => 3 , // Assuming device_id is the same as station_id
                'created_at' => $row['timestamp'] ,
                'updated_at' => $row['timestamp'] ,
            ];
        }

        // Insert the data in chunks
        foreach (array_chunk($preparedData, $chunkSize) as $chunk) {
            DB::table('tide_gauge_stations')->insert($chunk);
        }
    }
}
