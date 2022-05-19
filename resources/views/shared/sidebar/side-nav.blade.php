<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- hospital -->
                <div class="sb-sidenav-menu-heading">Hospital</div>

                @if (Auth::user()->role == 'manager')
                    @include('shared.sidebar.links.manager')
                    @include('shared.sidebar.links.patient')
                @endif

                @if (Auth::user()->role == 'assistant')
                    @include('shared.sidebar.links.patient')
                @endif

                @if (Auth::user()->role == 'accountant')
                    @include('shared.sidebar.links.change-salary')
                @endif

                @if (Auth::user()->role == 'doctor')
                    @include('shared.sidebar.links.medical-report')
                    @include('shared.sidebar.links.patient')
                @endif

                <!--end hospital -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Dashboard
                </a>
                {{-- <!-- interface -->
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Quick Access
                </a>
                <!-- end interface --> --}}

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ ucwords(Auth::user()->role) }}
        </div>
    </nav>
</div>
