<?php

namespace App\Http\Livewire\Admin\Reports\Book;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search ,$title ,$bookId ,$status;

    public function render()
    {
        $book = Book::query()
        ->when(!empty($this->search), function ($query) {
            $query->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            });
        })->when(!empty($this->status), function ($query) {
            $query->where('status', $this->status);
        })->paginate(10);

        return view('livewire.admin.reports.book.index' , compact('book'));
    }
}
