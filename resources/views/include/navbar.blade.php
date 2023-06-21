<div id="header">
    <div class="header-left">
        <i class="fa fa-bars" aria-hidden="true" id="toggle-left-menu"></i>
    </div>
    <!-- Header-right Start-->
    <div class="header-right">
        <!-- Dropdown-search Start-->
        <div class="header-dropdown-search">
            <div class="custom-dropdown">
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                        All
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="post-data" style="height:300px; overflow:auto;">
                        @include('include.data')
                    </ul>
                    <div class="ajax-load" style="display:none">
                        <p><img src="{{ asset('admin/images/loader.gif') }}">Loading More post</p>
                    </div>
                </div>
            </div>
            <div class="input-group search">
                <input class="form-control" type="search" value="Product search - Natural language query" id="">
                <span class="input-group-append">
                    <button class="btn border-start-0 border-bottom-0  ms-n5" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
        <!-- Dropdown-search End-->
        <!-- Header Nav Start-->
        <div class="header-nav">
            <ul>
                @if($sidebar =='default-sidebar')
                    <li> <a href="#">Account</a></li>
                    <li> <a href="#">Lighthouse</a></li>
                    <li> <a href="#">Billing</a></li>
                    <li> <a href="#">Teams</a></li>
                    <li> <a href="#">Company Info</a></li>
                @else
                    <li> <a href="#">Company Info</a></li>
                @endif
            </ul>
        </div>
        <!-- Header Nav End-->
        <!-- Settings Start-->
        <div class="custom-dropdown-nobg">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownSetttings" data-bs-toggle="dropdown">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </a>
                
                <ul class="dropdown-menu" aria-labelledby="dropdownSetttings">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
        <!-- Settings End-->
        <!-- User Profile Start-->
        <div class="user-profile">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownProfile" data-bs-toggle="dropdown">
                    <div class="profile-img"><img src="{{ asset('admin/images/profile-photo.jpg') }}" alt="" title=""></div>    
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownProfile">
                    <li><a class="dropdown-item" href="#"><i class="fa fa-user-o pe-2" aria-hidden="true"></i> <span class="align-middle">Profile</span></a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa fa-sticky-note-o pe-2" aria-hidden="true"></i> <span class="align-middle">Messages</span></a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> <span class="align-middle">Logout</span></a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <!-- User Profile End-->
    </div>
    <!-- Header-Right End-->
</div>