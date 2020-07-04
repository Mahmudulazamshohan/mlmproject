<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="label">Main</li>
                <li><a href="{{route('dashboard')}}"><i class="ti-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('profile')}}"><i class="ti-user"></i> Profile</a></li>
                <li><a href="{{route('refferal.link')}}"><i class="ti-share"></i> Refferal Link</a></li>
                <li><a href="{{route('withdraw')}}"><i class="ti-wallet"></i> Withdraw</a></li>
                <li><a href="{{route('loan')}}"><i class="ti-wallet"></i> Loan</a></li>
                <li><a href="{{route('levels-and-earnings')}}"><i class="ti-money"></i> Levels and Earnings</a></li>


                <li><a data-toggle="modal" data-target="#myModal"><i
                            class="ti-email"></i> Support</a>
                <li>
                <li><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="ti-close"></i> Logout</a>
                </li>
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <ul>--}}
{{--                            <li style="padding: 10px;word-wrap: break-word;font-size: 13px;">--}}
{{--                                1. Support – User can easily call or email support team +254751730030 & support@inuabizz.com--}}
{{--                            </li>--}}
{{--                            <li style="padding: 10px;word-wrap: break-word;font-size: 13px;">--}}
{{--                                2. Home link back to the website: www.inuabizz.com--}}
{{--                            </li>--}}
{{--                            <li style="padding: 10px;word-wrap: break-word;font-size: 13px;">--}}
{{--                                3. Profile part to be inserted here too for quick finding--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </a>--}}

{{--                </li>--}}
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Support From {{env('APP_NAME')}}
                </h4>
            </div>
            <div class="modal-body">
                <b>
                    Phone:
                </b>
                <p>
                    You can call to support team +254751730030
                </p>
                <b> Email :</b>
                <a href="mailto:someone@example.com?Subject={{env('APP_NAME')}} Support Center" target="_top" class="btn btn-info">
                    Send Mail to us
                </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- /# sidebar -->
