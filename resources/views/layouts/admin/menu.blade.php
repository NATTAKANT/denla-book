<li><a href="{{ route('admin.index') }}" class="ai-icon" aria-expanded="false">
    <i class="fa fa-home"></i>
    <span class="nav-text">หน้าหลัก</span>
</a>
</li>

<li><a href="{{ route('admin.booking.index') }}" class="ai-icon" aria-expanded="false">
    <i class="fa fa-book"></i>
    <span class="nav-text">การจอง</span>
</a>
</li>







<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
    <i class="fi fi-rr-settings"></i>
        <span class="nav-text">ตั้งค่าผู้ใช้ระบบ</span>
    </a>
    <ul aria-expanded="false" class="mm-collapse" style="">

        <li><a href="{{route('admin.setting-user.user.index') }}">เจ้าหน้าที่</a></li>
        <li><a href="{{route('admin.setting-user.positions.index')}}">ตำแหน่ง</a></li>
        <li><a href="{{route('admin.setting-user.title.index')}}">คำนำหน้า</a></li>


    </ul>
</li>

