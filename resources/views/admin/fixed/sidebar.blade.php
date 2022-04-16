<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
    </div>

    @php
        $nav = [
        ['Main', 'admin.home'],
        ['Products', 'products.index'],
        ['Users', 'users.index'],
        ['Users actions', 'users.action'],
        ['Orders', 'orders.index'] /*,
        ['Categories', 'useractions.index']*/
        ];
    @endphp
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                @foreach($nav as $n)
                    <li>
                        <a href="{{route($n[1])}}" class="@if(request()->routeIs($n[1])) mm-active @endif">
                            {{$n[0]}}
                        </a>
                    </li>
                    @endforeach

            </ul>

        </div>
    </div>
</div>
