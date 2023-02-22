<?php

namespace App\Http\Livewire\Admin\SettingUser\User;

use Livewire\Component;
use App\Models\User;

class UpdateOrCreate extends Component
{

    public $userId, $title_id, $role_id, $position_id,
           $firstname, $listname, $email, $status, $password,   
           $password_confirmation;

    public function render()
    {
        $user = User::get();

        return view('livewire.admin.setting-user.user.update-or-create',compact('user'));
    }

    public function edit_show($id)
    {
        $show = User::findOrFail($id);
        $this->userId = $id;
        $this->title_id = $show->title_id;
        $this->role_id = $show->role_id;
        $this->position_id = $show->position_id;
        $this->firstname = $show->firstname;
        $this->listname = $show->listname;
        $this->email = $show->email;
        $this->password = $show->password;
        $this->status = $show->status;
    }



public function save()
    {

       $this->validate(
            [
                   'title_id' => 'nullable',
                   'role_id' => 'nullable',
                   'position_id' => 'nullable',
                   'firstname' => 'required',
                   'listname' => 'nullable',
                   'email' => 'nullable',
                   'password' => 'required|min:8',
                   'password_confirmation' => 'nullable|required_with:password|same:password|min:8',

            ],
            [
                   'firstname.required' => 'กรุณาระบุชื่อ',
                   'password.required' => 'กรุณาระบุรหัสผ่าน',
                   'password_confirmation.required' => 'ยืนยันรหัสผ่าน',
            ]
        );
    try {

            Beds::updateOrCreate(
                [
                    'id'      => $this->userId
                ],
                [
                    'title_id'    => $this->title_id,
                    'role_id'    => $this->role_id,
                    'position_id'    => $this->position_id,
                    'firstname'    => $this->firstname,
                    'listname'    => $this->listname,
                    'email'    => $this->email,
                    'password'    => bcrypt($this->password),




                ]
            );

           $this->reset();
            session()->flash('message', ' Successfulthisly!!');
        } catch (\Exception $e) {

            session()->flash('error', $e);
        }
    }





}
