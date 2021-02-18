<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block ">
            <a href="{{route('dashboard.v1')}}" class="nav-link text-info">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link text-info">Role: {{get_role(auth()->id())}}</a>
        </li>

    </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"
                          style="font-size: 11px;font-weight: 700;"> {{count_noti()}} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                     style="max-height: 300px;max-width: 390px !important;overflow-y: auto;">
                    <span class="dropdown-item dropdown-header"><i class="far fa-bell"></i> {{count_noti()}} Notifications</span>
                    @forelse(get_unread_noti() as $notification)
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> <span
                                    style="font-size: 13px;font-weight: 600"> {{ $notification->fullname }}</span> <span
                                    class="float-right text-muted text-sm"
                                    style="font-size: 10px !important;margin-top: 6px;">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                            </br> <span style="font-size: 13px;"> {{ $notification->email }}</span>
                            <span style="font-size: 12px;text-transform: capitalize;font-style: italic;">
                            </span>
                                <span id="read_at"
                                      notification="{{$notification->id}}"
                                      notificationroute="{{route('users.read_notification',$notification->id)}}"

                                      style="font-size: 12px;border: none;margin-left: 20px;">Mark as read</span>

                        </a>
                        {{--                        User {{ $notification->fullname }} </br> ({{ $notification->email }}) has just registered.--}}
                    @empty
                        There are no new notifications
                    @endforelse


                </div>
            </li>
            <!-- Authentication Links -->
            @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->fullname }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logouts') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logouts') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
    <!-- Right navbar links -->
</nav>
<!-- /.navbar -->
<script>

    /*Ajax Employee Dropdown fill*/
    /*
        $(document).ready(function () {
            $("#read_at").onclick(function () {
                // AJAX request
                $.ajax({
{{--                    url: '{{route('users.read_notification')}}',--}}
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }
                    if (len > 0) {

                    }
                }
            });
        });
    });*/
    //Ajax Dropdwon fill end

</script>