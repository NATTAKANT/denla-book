<?php

namespace App\Http\Livewire\Admin\Books;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public
        $paginate = 10,
        $mode,
        $orderBy = 'created_at',
        $sortBy = 'desc',
        $filters = [];

    public function render()
    {
        return view('livewire.admin.books.index', [
            'books' => Book::query()
                ->with('Tags')
                ->orderBy($this->orderBy, $this->sortBy)
                ->paginate($this->paginate)
        ]);
    }
}
