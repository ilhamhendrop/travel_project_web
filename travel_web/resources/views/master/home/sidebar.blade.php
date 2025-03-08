<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link collapsed" href="{{ route('home.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-compass"></i></div>
                    Home
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        @if (Auth::user())
            <div class="small">Logged in as:</div>
            {{ Auth::user()->username }}
        @else
        @endif
    </div>
</nav>
