<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="label">Main</li>
                <li><a href="{{route('dashboard')}}"><i class="ti-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('refferal.link')}}"><i class="ti-user"></i> Refferal Link</a></li>
                <li><a href="{{route('withdraw')}}"><i class="ti-wallet"></i> Withdraw</a></li>
                <li><a href="{{route('levels-and-earnings')}}"><i class="ti-money"></i> Levels and Earnings</a></li>

                <li><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->
