<?php

namespace Database\Seeders;

use App\Models\BookTags;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class BookTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(BookTags $bookTags): void
    {
        if ($bookTags->count() == 0) :

            // Read the JSON file
            $old_biblio = file_get_contents(base_path('database/json/biblio.json'));
            // Decode the JSON file
            $old_biblio_data = json_decode($old_biblio, true);

            $collect_old_biblio = collect($old_biblio_data[2]['data']);
            $t1 = $collect_old_biblio->pluck('bibid', 'topic1');
            $t2 = $collect_old_biblio->pluck('bibid', 'topic2');
            $t3 = $collect_old_biblio->pluck('bibid', 'topic3');
            $t4 = $collect_old_biblio->pluck('bibid', 'topic4');
            $t5 = $collect_old_biblio->pluck('bibid', 'topic5');



            // เตรียม import ลงตาราง bookTags
            $collect = collect(Arr::collapse([$t1, $t2, $t3, $t4, $t5]));

            // dd($collect);

            foreach ($collect as $key => $value) {

                // $value['bibid'] = $key + 1;

                $new_bookTags[$key]['book_id'] = $key;

                $new_bookTags[$key]['tag_id'] = $value['name'];
            }


            // dd(collect($new_bookTags)->take(50));
            foreach ($new_bookTags as $key => $value) {
                $bookTags->create($value);
            }

        else :

            echo "\e[92m  data already seeded !! \n";

        endif;
    }
}
