@extends('layouts.form-layouts', ['title' => 'register'])

@section('content')

<div class="card-header ">
    <h3 class="text-center font-weight-light my-4">Register - 2</h3>
    <h6 class="text-center font-weight-light my-4">{{ucwords($user->role)}} | {{$user->email}}</h6>
</div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {!! Session::get('err') !!}
        </div>
    @endif
    <form method="POST" action="{{ route('register2', $user->id) }}">
        @csrf
        <div class="row justify-content-between">
            <div class="col-md-6 col-12">
                <div class="form-floating mb-3 ">
                    <input class="form-control" id="inputFname" name="fname" type="text" placeholder="First Name"
                        value="{{old('fname')}}"/>
                    <label for="inputFname">First Name</label>

                    @error('fname')
                        <small class="text-danger">* {{$message}}</small>
                        <script>
                            $('#inputFname').addClass('is-invalid').removeClass('is-valid')
                        </script>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-floating mb-3 ">
                    <input class="form-control" id="inputLname" name="lname" type="text" placeholder="Last Name"
                        value="{{old('lname')}}"/>
                    <label for="inputLname">Last Name</label>

                    @error('lname')
                        <small class="text-danger">* {{$message}}</small>
                        <script>
                            $('#inputLname').addClass('is-invalid').removeClass('is-valid')
                        </script>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputUsername" name="username" type="text" placeholder="Username"
                value="{{old('username')}}" />
            <label for="inputUsername">Username</label>

            @error('username')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputUsername').addClass('is-invalid').removeClass('is-valid')
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

        <div class="form-floating mb-3 ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">+2</div>
                </div>
                <input class="form-control" id="inputPhone" name="phone" type="text" placeholder="Phone"
                value="{{old('phone')}}" />

                {{-- <label for="inputPhone">Phone</label> --}}
            </div>

            @error('phone')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputPhone').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>

        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputAddress" name="address" type="text" placeholder="Address"
                value="{{old('address')}}" />
            <label for="inputAddress">Address</label>

            @error('address')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputAddress').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>

        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputNationalID" name="national_id" type="text" placeholder="National ID"
                value="{{old('national_id')}}" />
            <label for="inputNationalID">National ID</label>

            @error('national_id')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputNationalID').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>

        <div class="d-flex align-items-center mt-4 mb-0">
            <button class="btn btn-primary btn-block" type="submit">Register <i class="fa fa-arrow-right"></i></button>
            <a class="btn btn-link" href="{{ route('login') }}">Already Have An Account?</a>
        </div>
    </form>
</div>

@if ($errors->any())
    <script type="text/javascript">
        $('.form-control').each((i, elem) => {
            if( !$(elem).hasClass('is-invalid') )
                $(elem).addClass('is-valid');
        })
    </script>
@endif
@endsection
