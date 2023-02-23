<?php

namespace App\Http\Livewire\Admin\SettingUser\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Title;
use App\Models\Role;
use App\Models\Position;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{


    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public  $search, $roles, $userId, $title_id, $role_id, $position_id,
           $firstname, $lastname, $email, $status, $phone, $password,
           $password_confirmation;

    public function render()
    {


        $user = User::query()
        ->with(['position','role'])
        ->when(!empty($this->search), function ($query) {
            $query->where(function ($query) {
                $query->where('firstname', 'like', '%' . $this->search . '%');
                $query->orWhere('lastname', 'like', '%' . $this->search . '%');
                $query->orWhere(DB::raw('concat(firstname," ",lastname)'), 'like', '%' . $this->search . '%');
            });
        })->when(!empty($this->status), function ($query) {
            $query->where('status', $this->status);
        })->when(!empty($this->roles), function ($query) {
            $query->where('role_id', $this->roles);
        })->paginate(10);




        $title = Title::where('status', 1)->get();
        $position = Position::get();
        $role = Role::get();

        return view('livewire.admin.setting-user.user.index',compact('user' ,'title' ,'position' ,'role'));
    }

    public function create()
    {

       $this->validate(
            [
                'title_id' => 'required',
                'role_id' => 'required',
                'position_id' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users,email,'. $this->userId,
                'status' => 'required',
                'phone' => 'required|numeric|digits:10',
                'password' => 'required|min:8',
                'password_confirmation' => 'nullable|required_with:password|same:password|min:8',
            ],
            [
                'title_id.required' => 'ระบุคำนำหน้า',
                'role_id.required' => 'กรุณาระบุสิทธ์ผู้ใช้งาน',
                'position_id.required' => 'กรุณาระบุตำแนห่ง',
                'firstname.required' => 'กรุณาระบุชื่อ',
                'lastname.required' => 'กรุณาระบุนามสกุล',
                'email.required' => 'กรุณาระบุ email',
                'email.unique' => ':attribute นี้มีอยู่ในระบบแล้ว',
                'status.required' => 'กรุณาระบุสถานะ',
                'phone.required' => 'กรุณาระบุเบอร์โทรศัพท์มือถือ',
                'phone.digits' => 'โทรศัพท์มือถือต้องมีความยาว :digits หลัก',
                'phone.numeric' => 'กรุณาระบุเป็นตัวเลข',
                'password.required' => 'กรุณาระบุรหัสผ่าน',
                'password_confirmation.same' => ':attribute ไม่ตรงกับ :other',
                'password_confirmation.required' => 'ยืนยันรหัสผ่าน',
            ]
        );
    try {

        User::updateOrCreate(
                [
                    'id'      => $this->userId
                ],
                [
                    'title_id'    => $this->title_id,
                    'role_id'    => $this->role_id,
                    'position_id'    => $this->position_id,
                    'firstname'    => $this->firstname,
                    'lastname'    => $this->lastname,
                    'email'    => $this->email,
                    'status'    => $this->status,
                    'password'    => bcrypt($this->password),
                    'phone'    => $this->phone,

                ]
            );

            return redirect()->to('admin/setting-user/user/index');

        } catch (\Exception $e) {

            session()->flash('error', 'กรุณาตรวจสอบข้อมูล');
        }
    }





    public function edit_show($id)
    {
        $show = User::findOrFail($id);
        $this->userId = $id;
        $this->title_id = $show->title_id;
        $this->role_id = $show->role_id;
        $this->position_id = $show->position_id;
        $this->firstname = $show->firstname;
        $this->lastname = $show->lastname;
        $this->email = $show->email;
        $this->status = $show->status;
        $this->phone = $show->phone;


    }



public function update()
    {


    $this->validate(

        [
               'title_id' => 'required',
               'role_id' => 'required',
               'position_id' => 'required',
               'firstname' => 'required',
               'lastname' => 'required',
               'email' => 'required|email|unique:users,email,'. $this->userId,
               'status' => 'required',
               'phone' => 'required|numeric|digits:10',
               'password' => 'nullable|min:8',
               'password_confirmation' => 'nullable|required_with:password|same:password|min:8',

        ],
        [
               'title_id.required' => 'ระบุคำนำหน้า',
               'role_id.required' => 'กรุณาระบุสิทธ์ผู้ใช้งาน',
               'position_id.required' => 'กรุณาระบุตำแนห่ง',
               'firstname.required' => 'กรุณาระบุชื่อ',
               'lastname.required' => 'กรุณาระบุนามสกุล',
               'email.required' => 'กรุณาระบุ email',
               'email.unique' => ':attribute นี้มีอยู่ในระบบแล้ว',
               'status.required' => 'กรุณาระบุสถานะ',
               'phone.required' => 'กรุณาระบุเบอร์โทรศัพท์มือถือ',
               'phone.digits' => 'โทรศัพท์มือถือต้องมีความยาว :digits หลัก',
               'phone.numeric' => 'กรุณาระบุเป็นตัวเลข',
               'password_confirmation.same' => ':attribute ไม่ตรงกับ :other',
               'password_confirmation.required' => 'ยืนยันรหัสผ่าน',
        ]
    );



    try {


        $user = User::find($this->userId);
        if ($user) {
            $user->title_id = $this->title_id;
            $user->role_id = $this->role_id;
            $user->position_id = $this->position_id;
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->phone = $this->phone;
            $user->email = $this->email;
            if (!empty($this->password) && $this->password == $this->password_confirmation) {
                $user->password = bcrypt($this->password);
            }
            $user->status = $this->status;
            $user->save();
        }

            return redirect()->to('admin/setting-user/user/index');

        } catch (\Exception $e) {
            session()->flash('error', 'กรุณาตรวจสอบข้อมูล');

        }
    }





}
