<nav class="navbar navbar-inverse navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container ">

        <div class="navbar-header " style="display: flex;align-items: center">

            <a class="timLink" href="{{ route('.index') }}" style="display: inline-flex;">
                <div class="logo-container">
                    <div class="logo">
                        <img class="" src="{{ asset('img/customer') }}/logo_page_new.png" alt=""
                            style="width: 100%;height: 70px">
                    </div>

                </div>
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('.index') }}">
                        Trang chủ
                    </a>
                </li>
                {{-- <li>
                    <a href="home.html">
                        Giới thiệu
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('.index') }}">
                        Dịch vụ
                    </a>
                </li>
                <li>
                    <a href="{{ route('.index') }}">
                        Bác sĩ
                    </a>
                </li>
                @if (Auth::check())
                    <li class="dropdown"> 
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->User->name  }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-with-icons">
                            <li>
                                <a href="{{ route('login.logout') }}">
                                    <span style="font-weight:bold">LogOut</span>
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown"> 
                        <a href="{{ route('login.login') }}"    >
                            Đăng nhập
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('appointment.index') }}"
                        class="btn btn-round btn-default">Đặt lịch hẹn</a>
                </li>
            </ul>
        </div>
    </div>
</nav>