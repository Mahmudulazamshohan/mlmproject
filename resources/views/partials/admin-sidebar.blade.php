<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="label">Main</li>
                <li><a href="{{route('admin.dashboard')}}"><i class="ti-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('admin.users')}}"><i class="ti-user"></i> Users</a></li>
                <li><a href="{{route('admin.users')}}"><i class="ti-eye"></i> Members View</a></li>
                <li><a href="{{route('admin.manage-news')}}"><i class="ti-agenda"></i> Manage News</a></li>
                <li><a href="{{route('admin.withdraw-request')}}"><i class="ti-wallet"></i> Withdraw Request</a></li>
                <li><a href="{{route('admin.level-settings')}}"><i class="ti-settings"></i> Level Settings</a></li>

                <li><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->
