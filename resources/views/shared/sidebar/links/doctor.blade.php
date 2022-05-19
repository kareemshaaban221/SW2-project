{{-- doctor tasks --}}
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
    Doctors
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('doctors.index') }}">List All Doctors</a>
        <a class="nav-link" href="{{ route('doctors.create') }}">Add Doctor</a>
    </nav>
</div>
