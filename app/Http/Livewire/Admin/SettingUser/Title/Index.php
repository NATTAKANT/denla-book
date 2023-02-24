<?php

namespace App\Http\Livewire\Admin\SettingUser\Title;

use Livewire\Component;
use App\Models\Title;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public  $search, $name, $titleId, $status;

    public function render()
    {
        $title = Title::query()
        ->when(!empty($this->search), function ($query) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        })->when(!empty($this->status), function ($query) {
            $query->where('status', $this->status);
        })->paginate(10);



        return view('livewire.admin.setting-user.title.index' ,compact('title'));
    }

    public function edit_show($id)
    {
        $show = Title::findOrFail($id);
        $this->titleId = $id;
        $this->name = $show->name;
        $this->status = $show->status;
    }

    public function save()
    {

       $this->validate(
            [
                  'name' => 'required',
                  'status' => 'required'
            ],
            [
                'name.required' => 'กรุณาระบุคำนำหน้า',
                'status.required' => 'กรุณาระบุสถานะ',
            ]
        );
    try {

        Title::updateOrCreate(
                [
                    'id'    => $this->titleId
                ],
                [

                    'name'  => $this->name,
                    'status'=> $this->status,
                ]
            );

            return redirect()->to('admin/setting-user/title');

        } catch (\Exception $e) {

            session()->flash('error', 'ชื่อคำนำหน้า');
        }
    }

}
