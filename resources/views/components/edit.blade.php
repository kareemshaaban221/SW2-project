@extends('layouts.form-layouts', ['title' => $user->fname . ' ' . $user->lname])

@section('content')
<div class="card-header "><h3 class="text-center font-weight-light my-4">{{ucwords($employee)}} | {{$user->fname.' '.$user->lname}}</h3></div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {{Session::get('err')}}
        </div>
    @endif
    <form method="POST" action="{{ route("{$employee}s.update", $user->id) }}">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputFname" name="fname" type="text" placeholder="First Name"
                value="{{old('fname') ? old('fname') : $user->fname}}" />
            <label for="inputFname">First Name</label>

            @error('fname')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputFname').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>

        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputLname" name="lname" type="text" placeholder="Last Name"
                value="{{old('lname') ? old('lname') : $user->lname}}" />
            <label for="inputLname">Last Name</label>

            @error('lname')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputLname').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>

        <div class="row justify-content-between">
            <div class="col-md-6 col-12">
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputUsername" disabled type="text" placeholder="Username"
                        value="{{$user->username}}" />
                    <label for="inputUsername">Username</label>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" disabled type="text" placeholder="Email"
                        value="{{$user->email}}" />
                    <label for="inputEmail">Email</label>
                </div>
            </div>
        </div>

        @if ($employee)

        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputNationalID" name="national_id" type="text" placeholder="National ID"
                value="{{old('national_id') ? old('national_id') : ($employee == 'manager' ? $user->manager->national_id  : $user->employee->national_id  )}}" />
            <label for="inputNationalID">National ID</label>

            @error('national_id')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputNationalID').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>

        <div class="row justify-content-between">
            <div class="col-md-6 col-12">
                <div class="form-floating mb-3 ">
                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="New Password" />
                    <label for="inputPassword">New Password</label>
                    <i class="fa fa-eye showPassBtn" role="button" style="position: absolute; top: 40%; right: 30px"></i>

                    @error('password')
                        <small class="text-danger">* {{$message}}</small>
                        <script>
                            $('#inputPassword').addClass('is-invalid').removeClass('is-valid')
                        </script>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-floating mb-3 ">
                    <input class="form-control" id="inputConfirmPassword" name="password_confirmation" type="password" placeholder="New Password" />
                    <label for="inputConfirmPassword">Confirm Password</label>
                    <i class="fa fa-eye showPassBtn" role="button" style="position: absolute; top: 40%; right: 30px"></i>

                    @error('password_confirmation')
                        <small class="text-danger">* {{$message}}</small>
                        <script>
                            $('#inputConfirmPassword').addClass('is-invalid').removeClass('is-valid')
                        </script>
                    @enderror
                </div>
            </div>
        </div>

        @endif

        <div class="form-floating mb-3 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">+2</div>
                </div>
                <input class="form-control" id="inputPhone" name="phone" type="text" placeholder="Phone"
                value="{{old('phone') ? old('phone') : $user->phone}}" />

                {{-- <label for="inputPhone">Phone</label> --}}
            </div>

            @error('phone')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputPhone').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>

        @if ($employee == 'manager')
            <div class="form-floating mb-3 ">
                <input class="form-control" id="inputSalary" disabled type="text" placeholder="Salary"
                    value="{{$user->manager->salary ? $user->manager->salary : 'Not Specified'}}" />
                <label for="inputSalary">Salary</label>
            </div>
        @elseif ($employee)
            <div class="form-floating mb-3 ">
                <input class="form-control" id="inputSalary" disabled type="text" placeholder="Salary"
                    value="{{$user->employee->salary ? $user->employee->salary : 'Not Specified'}}" />
                <label for="inputSalary">Salary</label>
            </div>
        @endif

        @yield('edit')

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <a class="btn btn-outline-dark col-lg-2 col-md-2" href="{{route("{$employee}s.show", $user->username)}}">
                <i class="fa fa-user"></i>
                Profile
            </a>
            <button class="btn btn-primary col-lg-4 col-md-4" type="submit">Update</button>
        </div>
    </form>
</div>

@if ($errors->any())
    <script type="text/javascript">
        $('.form-control').each((i, elem) => {
            if(!elem.hasAttribute('disabled')) {
                if( !$(elem).hasClass('is-invalid') )
                $(elem).addClass('is-valid');
            }
        })
    </script>
@endif
@endsection
