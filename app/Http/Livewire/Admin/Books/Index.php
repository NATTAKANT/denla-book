<?php

namespace App\Http\Livewire\Admin\Books;

use Livewire\Component;
use App\Models\Book;
use App\Models\BookTag;
use App\Models\Collection;
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
        $filters = [];
    public $form = [];
    public $tagselect;

    protected $rules = [
        'form.title' => 'required',
        'form.title_another' => '',
        'form.material_id' => 'required',
        'form.collection_id' => 'required',
        'form.location_id' => 'required',
        'form.call_number' => 'required',
        'form.ISBN' => 'required',
        'form.ISSN' => '',
        'form.DOI' => '',
        'form.author' => 'required',
        'form.author_co' => '',
        'form.responsibility' => '',
        'form.publisher' => 'required',
        'form.page' => 'number',
        'form.synopsis' => '',
        'form.book_count' => '',
        'form.status' => 'required',
        'form.tags' => ''
    ];

    protected $messages = [];


    public function render()
    {
        return view('livewire.admin.books.index', [
            'books' => $this->books(),
            'collections' => Collection::whereStatus('active')->get(),
            'tags' => Tag::whereStatus('active')->where('name', '!=', '')->get(),
            'materials' => Material::whereStatus('active')->get(),
        ]);
    }

    public function submit(Book $book, BookTag $bookTags)
    {
    }

    public function select($i)
    {
        dd($i);
        Arr::add($this->form, 'tags', $this->tagselect);
        dd($this->form);
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
