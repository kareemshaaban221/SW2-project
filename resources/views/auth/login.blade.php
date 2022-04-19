@extends('layouts.form-layouts', ['title' => 'login'])

@section('content')

<div class="card-header "><h3 class="text-center font-weight-light my-4">Login</h3></div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {{Session::get('err')}}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputEmail" name="identifier" type="text" placeholder="Username Or Email"
                value="{{old('identifier')}}" />
            <label for="inputEmail">Username or email</label>

            @error('identifier')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputEmail').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password"
                value="{{old('password')}}" />
            <label for="inputPassword">Password</label>
            <i class="fa fa-eye showPassBtn" role="button" style="position: absolute; top: 40%; right: 30px"></i>

            @error('password')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputPassword').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>
        {{-- <div class="form-check mb-3">
            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
        </div> --}}
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            @endif
            <button class="btn btn-primary btn-block col-12" type="submit">Login</button>
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
