<div class="app-header header-shadow">

    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
            </button>
        </div>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="{{route("home")}}" class="nav-link">
                        <i class="nav-link-icon fa fa-home"> </i>
                        Home
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="{{route("logout")}}" class="nav-link">
                        <i class="nav-link-icon fa fa-sign-out"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">

                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                               Admin:
                            </div>
                            <div class="widget-subheading font-weight-bold">
                               {{session()->get("user")->first_name." ".session()->get("user")->last_name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
