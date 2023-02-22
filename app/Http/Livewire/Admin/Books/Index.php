<?php

namespace App\Http\Livewire\Admin\Books;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 20;

    public function render(Book $books)
    {
        return view('livewire.admin.books.index', ['books' => $books->with('BookTags')->paginate($this->paginate)]);
    }
}
