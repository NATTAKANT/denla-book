<?php

namespace App\Http\Livewire\Admin\SettingUser\Positions;

use Livewire\Component;
use App\Models\Position;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $search, $name, $positionId, $status;

    public function render()
    {
        $position = Position::query()->paginate(10);
        return view('livewire.admin.setting-user.positions.index'
        ,compact('position'));
    }

    public function edit_show($id)
    {
        $show = Position::findOrFail($id);
        $this->positionId = $id;
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
                'name.required' => 'กรุณาระบุชื่อ',
                'status.required' => 'กรุณาระบุสถานะ',
            ]
        );
    try {

        Position::updateOrCreate(
                [
                    'id'             => $this->positionId
                ],
                [
                    'name'    => $this->name,
                    'status'      => $this->status,
                ]
            );

            return redirect()->to('admin/setting-user/positions');

        } catch (\Exception $e) {

            session()->flash('error', 'ชื่อตำแหน่งซ้ำ');
        }
    }

}
