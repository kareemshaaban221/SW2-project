{{-- Assistant tasks --}}
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse"  data-bs-target="#pagesCollapseAssistent" aria-expanded="false" aria-controls="pagesCollapseAssistent" >
    Receptionists
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="pagesCollapseAssistent" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('receptionists.index') }}">List All Receptionists</a>
        <a class="nav-link" href="{{ route('receptionists.create') }}">Add Receptionist</a>
    </nav>
</div>
