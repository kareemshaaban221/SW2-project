@extends('components.profile', ['employee' => NULL])

@section('profile')

<div class="col-lg-3 col-md-5 col-sm-7 m-auto row mb-3 mt-3 justify-content-around">
    <a href="{{route('patients.index')}}" class="btn btn-outline-dark col-5">
        <i class="fa fa-users"></i>
        List
    </a>
    <a href="{{route('patients.edit', $user->username)}}" class="btn btn-outline-primary col-5">
        <i class="fa fa-edit"></i>
        Edit
    </a>
</div>

@endsection
