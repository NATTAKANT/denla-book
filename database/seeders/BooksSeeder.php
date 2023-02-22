<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Book $books): void
    {
        if ($books->count() == 0) :


            // Read the JSON file
            $old_biblio = file_get_contents(base_path('database/json/biblio.json'));
            // Decode the JSON file
            $old_biblio_data = json_decode($old_biblio, true);

            $collect_old_biblio = collect($old_biblio_data[2]['data']);

            foreach ($this->GetBook($collect_old_biblio) as  $value) {
                $books->create($value);
            }

        else :

            echo "\e[92m  data already seeded !! \n";

        endif;
    }


    public function GetBook($arr = [])
    {



        foreach ($arr as $key => $value) {

            switch ($value['material_cd']) {
                case 2:
                    $value['material_cd'] = 1;
                    break;
                case 3:
                    $value['material_cd'] = 2;
                    break;
                case 4:
                    $value['material_cd'] = 3;
                    break;
                case 7:
                    $value['material_cd'] = 4;
                    break;
                case 8:
                    $value['material_cd'] = 5;
                    break;
                case 9:
                    $value['material_cd'] = 6;
                    break;
                case 10:
                    $value['material_cd'] = 7;
                    break;
            }


            switch ($value['collection_cd']) {
                case 1:
                    $value['collection_cd'] = 1;
                    break;
                case 8:
                    $value['collection_cd'] = 2;
                    break;
                case 7:
                    $value['collection_cd'] = 3;
                    break;
                case 9:
                    $value['collection_cd'] = 4;
                    break;
                case 10:
                    $value['collection_cd'] = 5;
                    break;
                case 11:
                    $value['collection_cd'] = 6;
                    break;
                case 12:
                    $value['collection_cd'] = 7;
                    break;
                case 13:
                    $value['collection_cd'] = 8;
                    break;
            }

            $new_books[$key]['location_id'] = $value['bibid'];

            $new_books[$key]['material_id'] = $value['material_cd'];

            $new_books[$key]['collection_id'] = $value['collection_cd'];

            $new_books[$key]['call_number'] = $value['call_nmbr1'];

            // $new_books[$key]['isbn_2'] = $value['call_nmbr2'];

            // $new_books[$key]['isbn_3'] = $value['call_nmbr3'];

            $new_books[$key]['title'] = $value['title'];

            $new_books[$key]['title_another'] = $value['title_remainder'];

            $new_books[$key]['responsibility'] = $value['responsibility_stmt'];

            $new_books[$key]['author'] = $value['author'];



        }

        return $new_books;
    }
}
