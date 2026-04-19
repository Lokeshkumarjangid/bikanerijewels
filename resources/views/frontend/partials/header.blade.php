<header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-2">
                    <div class="header__logo">
                        <a href="/">
                            <img src="{{ asset('image/logo.jpg') }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            @foreach($menuItems as $nav)
                                <li><a href="">{{ $nav->name }}</a>
                                @if($nav->categories->count() > 0)
                                    <ul class="dropdown">
                                        @foreach($nav->categories as $subNav)
                                            <li><a href="">{{ $subNav->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                                </li>
                            @endforeach

                            <li><a href="">Contact Us</a></li>
                            @if(Auth::check())
                            <li class="profile-menu"><a href="#"><div class="profile-circle"><i class="fa fa-user"></i></div></a>

                                <ul class="dropdown">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </li>
                            @else
                                <li><a href="{{route('loginoption')}}">Log In</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!-- <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <a href="#"><img src="img/icon/heart.png" alt=""></a>
                        <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div> -->
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>