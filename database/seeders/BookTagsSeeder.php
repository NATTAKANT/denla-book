<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class BookTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(BookTag $bookTags): void
    {
        if ($bookTags->count() == 0) :

            // Read the JSON file
            $old_biblio = file_get_contents(base_path('database/json/biblio.json'));
            // Decode the JSON file
            $old_biblio_data = json_decode($old_biblio, true);

            $collect_old_biblio = collect($old_biblio_data[2]['data']);
            $t1 = $collect_old_biblio->where('topic1', '!=', '')->toArray();
            $t2 = $collect_old_biblio->where('topic2', '!=', '')->toArray();
            $t3 = $collect_old_biblio->where('topic3', '!=', '')->toArray();
            $t4 = $collect_old_biblio->where('topic4', '!=', '')->toArray();
            $t5 = $collect_old_biblio->where('topic5', '!=', '')->toArray();



            // เตรียม import ลงตาราง bookTags


            $tags = Tag::all();
            foreach ($t1 as $key => $value) {
                foreach ($tags as $keys => $values) {
                    if ($value['topic1'] == $values->name) {
                        $set1[$key]['tag_id'] = $values->id;
                        $set1[$key]['book_id'] = $value['bibid'];
                    }
                }
            }
            foreach ($set1 as $key => $value) {
                $bookTags->create($value);
            }

            foreach ($t2 as $key => $value) {
                foreach ($tags as $keys => $values) {
                    if ($value['topic2'] == $values->name) {
                        $set2[$key]['tag_id'] = $values->id;
                        $set2[$key]['book_id'] = $value['bibid'];
                    }
                }
            }
            foreach ($set2 as $key => $value) {
                $bookTags->create($value);
            }

            foreach ($t3 as $key => $value) {
                foreach ($tags as $keys => $values) {
                    if ($value['topic3'] == $values->name) {
                        $set3[$key]['tag_id'] = $values->id;
                        $set3[$key]['book_id'] = $value['bibid'];
                    }
                }
            }
            foreach ($set3 as $key => $value) {
                $bookTags->create($value);
            }

            foreach ($t4 as $key => $value) {
                foreach ($tags as $keys => $values) {
                    if ($value['topic4'] == $values->name) {
                        $set4[$key]['tag_id'] = $values->id;
                        $set4[$key]['book_id'] = $value['bibid'];
                    }
                }
            }
            foreach ($set4 as $key => $value) {
                $bookTags->create($value);
            }

            foreach ($t5 as $key => $value) {
                foreach ($tags as $keys => $values) {
                    if ($value['topic5'] == $values->name) {
                        $set5[$key]['tag_id'] = $values->id;
                        $set5[$key]['book_id'] = $value['bibid'];
                    }
                }
            }
            foreach ($set5 as $key => $value) {
                $bookTags->create($value);
            }

            foreach (Book::all() as $key => $value) {
                $bookTags->where('book_id', $value->location_id)->update([
                    'book_id' => $value->id,
                ]);
            }

            Book::whereNotNull('id')->update(['location_id' => 0]);


        else :

            echo "\e[92m  data already seeded !! \n";

        endif;
    }
}
