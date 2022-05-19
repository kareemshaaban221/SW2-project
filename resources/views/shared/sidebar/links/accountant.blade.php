{{-- accountant tasks --}}
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse"  data-bs-target="#collapseAccountant" aria-expanded="false" aria-controls="collapseAccountant" >
    Accountants
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseAccountant" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('accountants.index') }}">List All Accountants</a>
        <a class="nav-link" href="{{ route('accountants.create') }}">Add Accountant</a>
    </nav>
</div>
