<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePatients" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user-tie"></i></div>
    Patients
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapsePatients" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('patients.index') }}">List All Patients</a>

        @if (Auth::user()->role == 'receptionist')
            <a class="nav-link" href="{{ route('patients.create') }}">Add Patient</a>
        @endif
    </nav>
</div>
