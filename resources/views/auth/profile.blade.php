@extends('components.profile', Auth::user()->role == 'manager' ? ['employee' => $user->manager] : ['employee' => $user->employee])

@section('profile')

<div class="col-lg-3 col-md-5 col-sm-7 m-auto row mb-3 mt-3 justify-content-around">
    <a href="{{route('profile.edit')}}" class="btn btn-outline-primary col-10">
        <i class="fa fa-edit"></i>
        Edit
    </a>
</div>

@endsection
