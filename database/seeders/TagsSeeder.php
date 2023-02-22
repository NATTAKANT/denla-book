<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Tags $tags): void
    {

        if ($tags->count() == 0) :

            // Read the JSON file
            $old_biblio = file_get_contents(base_path('database/json/biblio.json'));
            // Decode the JSON file
            $old_biblio_data = json_decode($old_biblio, true);

            $collect_old_biblio = collect($old_biblio_data[2]['data']);
            $t1 = $collect_old_biblio->pluck('topic1');
            $t2 = $collect_old_biblio->pluck('topic2');
            $t3 = $collect_old_biblio->pluck('topic3');
            $t4 = $collect_old_biblio->pluck('topic4');
            $t5 = $collect_old_biblio->pluck('topic5');

            // เตรียม import ลงตาราง tags
            $collect = collect(Arr::collapse([$t1, $t2, $t3, $t4, $t5]))->unique();

            // dd($collect);
            foreach ($collect as $key => $value) {
                $new_tags[$key]['name'] = $value;
            }

            // dd($new_tags);
            foreach ($new_tags as $key => $value) {

                $tags->create($value);
            }



        else :

            echo "\e[92m  data already seeded !! \n";

        endif;
    }
}
