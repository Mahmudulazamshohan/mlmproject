@php
    $notifications  =[];
    $total = 0;

    $pushNotifications = \App\PushNotification::all();
    $pushNotificationViews = \App\PushNotificationView::with('PushNotification')
    ->where('id',\Illuminate\Support\Facades\Auth::id())->get();
    foreach ($pushNotificationViews as $pushNotificationView) {
        if($pushNotificationView->PushNotification){
            $total += 1;
        }
    }
    $total = $pushNotifications->count() - $total;
@endphp
<li class="header-icon dib"><i class="ti-bell"></i>
{{--    @if($total)--}}
{{--    <button class="badge badge-success"--}}
{{--            style="width: 25px;height: 25px;border-radius: 50%;border:none;background: #555;color: white;">{{$total}}--}}
{{--    </button>--}}
{{--    @endif--}}
    <div class="drop-down">
        <div class="dropdown-content-heading">
            <span class="text-left">Recent Notifications</span>
        </div>
        <div class="dropdown-content-body">
            <ul>
                @foreach($pushNotifications as $pushNotification)
                    <li>
                        <a href="{{route('view-notification',$pushNotification->id)}}">
                           <div class="notification-content">
                                <small class="notification-timestamp pull-right">{{$pushNotification->created_at->calendar()}}</small>
                                <div class="notification-heading">Admin</div>
                                @if($pushNotification->title)
                                    <div class="notification-text"><?=$pushNotification->title?></div>
                                @endif
                            </div>
                        </a>
                    </li>
                @endforeach


                <li class="text-center">
                    <a href="{{route('notifications')}}" class="more-link" style="width: 100%;height: 100%;">See All</a>
                </li>
            </ul>
        </div>
    </div>
</li>
