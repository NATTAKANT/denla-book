<?php

namespace App\Http\Livewire\Admin\Books;

use Livewire\Component;
use App\Models\Book;
use App\Models\BookTag;
use App\Models\Collection;
use App\Models\Location;
use App\Models\Material;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public
        $paginate = 10,
        $mode = 0,
        $orderBy = 'created_at',
        $sortBy = 'desc',
        $tagselect,
        $filters = [];

    public $form = [

        'book_id' => null,
        'title' => null,
        'title_another' => null,
        'material_id' => null,
        'collection_id' => null,
        'location_id' => null,
        'call_number' => null,
        'ISBN' => null,
        'ISSN' => null,
        'DOI' => null,
        'img_new' => null,
        'author' => null,
        'author_co' => null,
        'responsibility' => null,
        'publisher' => null,
        'page' => null,
        'synopsis' => null,

    ];

    protected $rules = [
        'form.title' => 'required',
        'form.material_id' => 'required',
        'form.collection_id' => 'required',
        'form.location_id' => 'required',
        'form.call_number' => 'required',
        'form.ISBN' => 'required',
        'form.author' => 'required',
        'form.publisher' => 'required',
        // 'form.page' => 'numeric',
        'form.status' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin.books.index', [
            'books' => $this->books(),
            'collections' => Collection::select('id', 'name')->whereStatus('active')->get(),
            'tags' => Tag::select('id', 'name')->whereStatus('active')->where('name', '!=', '')->get(),
            'materials' => Material::select('id', 'name')->whereStatus('active')->get(),
            'locations' => Location::select('id', 'name')->whereStatus('active')->get(),
        ]);
    }

    public function edit($id)
    {
        $book =  Book::find($id);

        $this->form = [
            'book_id' => $book->id,
            'title' => $book->title,
            'title_another' => $book->title_another,
            'material_id' => $book->material_id,
            'collection_id' => $book->collection_id,
            'location_id' => $book->location_id,
            'call_number' => $book->call_number,
            'ISBN' => $book->ISBN,
            'ISSN' => $book->ISSN,
            'DOI' => $book->DOI,
            'img_old' => $book->img,
            'author' => $book->author,
            'author_co' => $book->author_co,
            'responsibility' => $book->responsibility,
            'publisher' => $book->publisher,
            'page' => $book->page,
            'synopsis' => $book->synopsis,
            'status' => $book->status,
        ];

        // dd($this->form['img_old']);

        $this->tagselect = $book->tags->pluck('id');
        $this->emit('parameterSet', $this->tagselect, $this->form['status']);
    }

    public function uploadImage($file, $book_id, $status)
    {
        $file_name
            =  'BC_' .
            $book_id .
            now()->format('YmdHis') .
            '.' .
            $file->extension();

        if ($status) {

            $file->storeAs('public/book_cover', $file_name);

            Book::whereId($book_id)->update([

                'img' => $file_name

            ]);
        }
    }

    public function submit()
    {


        isset($this->form['status'])
            ?
            $this->form['status']  = $this->form['status']
            :
            $this->form['status'] = true;

        $this->form['status'] == true
            ? $this->form['status']  = 'active'
            : $this->form['status'] = 'inactive';

        $this->validate();

        Book::query()
            ->updateOrCreate(
                [
                    'id' => $this->form['book_id']
                ],
                [
                    'title' => $this->form['title'],
                    'title_another' => $this->form['title_another'],
                    'material_id' => $this->form['material_id'],
                    'collection_id' => $this->form['collection_id'],
                    'location_id' => $this->form['location_id'],
                    'call_number' => $this->form['call_number'],
                    'ISBN' => $this->form['ISBN'],
                    'ISSN' => $this->form['ISSN'],
                    'DOI' => $this->form['DOI'],
                    // 'img' => $this->form['img'],
                    'author' => $this->form['author'],
                    'author_co' => $this->form['author_co'],
                    'responsibility' => $this->form['responsibility'],
                    'publisher' => $this->form['publisher'],
                    'page' => $this->form['page'],
                    'synopsis' => $this->form['synopsis'],
                    'status' => $this->form['status'],
                ]
            )
            ->book_tags()
            ->attach($this->tagselect);

        isset($this->form['book_id'])
            ? $book_upload = $this->form['book_id']
            :  $book_upload = Book::latest()->first()->id;

        isset($this->form['img_new'])
            ? $this->uploadImage($this->form['img_new'], $book_upload, true)
            : $this->uploadImage(null, $book_upload, false);



        $book_tag =  BookTag::query();

        $this->tagselect != null
            ? $book_tag->whereBookId($this->form['book_id'])->whereNotIn('tag_id', $this->tagselect)->delete()
            : false;

        $duplicated =  BookTag::whereBookId($this->form['book_id'])->get()
            ->unique(function ($item) {
                return $item['book_id'] . $item['tag_id'];
            })->pluck('id');


        $book_tag->whereNotIn('id', $duplicated)->delete();

        $this->reset();
    }

    public function cancel()
    {
        $this->reset();
    }


    private function books()
    {
        return  Book::query()
            ->with('Tags')
            ->when(Arr::exists($this->filters, 'title'), function ($query) {
                $query->where('title', 'like', '%' .  $this->filters['title'] . '%');
            })
            ->when(Arr::exists($this->filters, 'author'), function ($query) {
                $query->where('author', 'like', '%' .  $this->filters['author'] . '%');
            })
            ->when(Arr::exists($this->filters, 'status') && $this->filters['status'] != '', function ($query) {
                $query->whereStatus($this->filters['status']);
            })
            ->orderBy($this->orderBy, $this->sortBy)
            ->paginate($this->paginate);
    }
}
