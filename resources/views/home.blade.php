@extends('layouts.app', ['title' => 'dashboard'])

@section('content')
<!-- cards -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">TESTS cv-19</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <p class="text-white text-center py-2 display-3 fw-bolder">15.2k</p>
                <div class="small text-white"><i class="fas fa-solid fa-file-medical fs-2"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">NEW CASES cv-19</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <p class="text-white text-center py-2 display-3 fw-bolder">33.5k</p>
                <div class="small text-white"><i class="fas fa-solid fa-viruses fs-2"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">VACCINATIONS cv-19</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <p class="text-white text-center py-2 display-3 fw-bolder">33.5k</p>
                <div class="small text-white"><i class="fas fa-solid fa-shield-virus fs-2"></i></div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">DEATH</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <p class="text-white text-center py-2 display-3 fw-bolder">50.3K</p>
                <div class="small text-white"><i class="fas fa-solid fa-skull-crossbones fs-2"></i></div>
            </div>
        </div>
    </div>
</div>
<!-- cards -->
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                HOSPITAL SURVEY
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                NEW PATIENT
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>
@endsection
