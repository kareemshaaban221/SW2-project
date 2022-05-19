@extends('layouts.app', ['title' => $user->fname . ' ' . $user->lname])

@section('content')

@if (Session::has('done'))
    <div class="alert alert-success text-center position-absolute w-50 bg-transparent-success timer-5s" style="top: 15px; left: 25%">
        {{Session::get('done')}}
    </div>
@endif
<div class="card mb-4 text-center">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        {{ ucwords($user->fname) }}'s data
    </div>
    <div class="card-body">
        <div class="m-auto">
            <div class="row justify-content-around mb-3">
                <div class="position-relative w-auto">
                    <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="" width="150" height="150" style="width: 150px; height: 150px; border-radius: 50%">
                    <button class="btn btn-warning text-light position-absolute p-0" style="width: 25px; font-size: 15px; bottom: 0; right: 20px"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <hr class="w-50 m-auto">
            <div class="row mb-3 mt-3 justify-content-around">
                <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">First Name</div>
                <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">{{ucwords($user->fname)}}</div>
            </div>
            <hr class="w-50 m-auto">
            <div class="row mb-3 mt-3 justify-content-around">
                <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">Last Name</div>
                <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">{{ucwords($user->lname)}}</div>
            </div>
            <hr class="w-50 m-auto">
            <div class="row mb-3 mt-3 justify-content-around">
                <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">Email</div>
                <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">{{$user->email}}</div>
            </div>
            <hr class="w-50 m-auto">
            <div class="row mb-3 mt-3 justify-content-around">
                <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">Phone</div>
                <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">+2{{$user->phone}}</div>
            </div>
            <hr class="w-50 m-auto">
            <div class="row mb-3 mt-3 justify-content-around">
                <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">Address</div>
                <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">{{$user->address}}</div>
            </div>

            @if ($user->role != 'patient')
                <hr class="w-50 m-auto">
                <div class="row mb-3 mt-3 justify-content-around">
                    <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">National ID</div>
                    <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">{{$employee->national_id}}</div>
                </div>
                <hr class="w-50 m-auto">
                <div class="row mb-3 mt-3 justify-content-around">
                    <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">Salary</div>
                    <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">{{$employee->salary ? $employee->salary : 'No Salary Specified'}}</div>
                </div>

            @else
                <hr class="w-50 m-auto">
                <div class="row mb-3 mt-3 justify-content-around">
                    <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">Clinic</div>
                    <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">{{ucwords($patient->doctor->clinic->name)}}</div>
                </div>
                <hr class="w-50 m-auto">
                <div class="row mb-3 mt-3 justify-content-around">
                    <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">Doctor In Charge</div>
                    <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">
                        <a class="text-decoration-none" href="{{route('doctors.show', $patient->doctor->employee->user->username)}}">
                            {{ucwords($patient->doctor->employee->user->fname)}}
                        </a>
                    </div>
                </div>
                <hr class="w-50 m-auto">
                <div class="row mb-3 mt-3 justify-content-around">
                    <div class="col-5 text-primary" style="font-weight: bold; text-align: right;">Status</div>
                    <div class="col-5 overflow-auto" style="height: 25px; text-align: left;">
                        @if ($patient->status)
                            @if ($patient->status == 'Late state')
                                <span class="badge bg-danger">{{$patient->status}}</span>
                            @elseif ($patient->status == 'Need diagnosis')
                                <span class="badge bg-warning">{{$patient->status}}</span>
                            @else
                                <span class="badge bg-success">{{$patient->status}}</span>
                            @endif
                        @else
                            Not Set Yet!
                        @endif
                    </div>
                </div>
            @endif

            @yield('profile')

        </div>
    </div>
</div>
@endsection
