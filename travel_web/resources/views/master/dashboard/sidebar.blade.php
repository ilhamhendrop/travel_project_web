<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            @if (Auth::user()->role == 'Admin')
                <div class="sb-sidenav-menu-heading">User</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#userLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    User
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="userLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('user.admin.index') }}">Admin</a>
                        <a class="nav-link" href="{{ route('user.index') }}">User</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Travel</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#travelLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-compass"></i></div>
                    Travel
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="travelLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('travel.index') }}">Travel</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Order</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#orderLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                    Order
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="orderLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('order.index') }}">Order</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Histori</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#historiLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    Histori
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="historiLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('history.admin.index') }}">All Order</a>
                        <a class="nav-link" href="{{ route('history.user.index') }}">Histori</a>
                    </nav>
                </div>
            @else
                <div class="sb-sidenav-menu-heading">Histori</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#historiLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    Histori
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="historiLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('history.user.index') }}">Histori</a>
                    </nav>
                </div>
            @endif
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->username }}
    </div>
</nav>
