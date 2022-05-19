@extends('layouts.app', ['title' => 'dashboard', 'dataGraph' => [$cases2020, $cases2021, $cases2022]])

@section('content')
<!-- cards -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">TODAY CASES cv-19</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <p class="text-white text-center py-2 display-3 fw-bolder">{{$totalCurrent}}k</p>
                <div class="small text-white"><i class="fas fa-solid fa-file-medical fs-2"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">NEW CASES cv-19</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <p class="text-white text-center py-2 display-3 fw-bolder">{{$newCases}}k</p>
                <div class="small text-white"><i class="fas fa-solid fa-viruses fs-2"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
            <div class="card-body">ACTIVE CASES cv-19</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <p class="text-white text-center py-2 display-3 fw-bolder">{{$totalActive}}k</p>
                <div class="small text-white"><i class="fas fa-solid fa-shield-virus fs-2"></i></div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">DEATH</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <p class="text-white text-center py-2 display-3 fw-bolder">{{$deaths}}k</p>
                <div class="small text-white"><i class="fas fa-solid fa-skull-crossbones fs-2"></i></div>
            </div>
        </div>
    </div>
</div>
<!-- cards -->
<div class="row">
    <div class="col-xl-12">
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
