<?php

namespace Database\Seeders;

use App\Models\Materials;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Materials $materials): void
    {
        /* This is checking to see if the database is empty. If it is empty, it will run the code. */
        if ($materials->count() == 0) :

            /* Getting the contents of the file. */
            $old_collection =  file_get_contents(base_path('database/json/material.json'));

            /* Decoding the json file. */
            $old_collection_data = json_decode($old_collection, true);

            /* Converting the array into a collection. */
            $collect_old_collection = collect($old_collection_data[2]['data']);

            /* Creating a new array with the values of the old array. */
            foreach ($collect_old_collection as $key => $value) {
                $puhs_old_collection[$key]['name'] = $value['description'];
            }

            /* Creating a new collection in the database. */
            foreach ($puhs_old_collection as $key => $value) {

                $materials->create($value);
            }

        else :

            echo "\e[92m  data already seeded !! \n";

        endif;
    }
}
