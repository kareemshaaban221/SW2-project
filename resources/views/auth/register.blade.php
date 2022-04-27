@extends('layouts.form-layouts', ['title' => 'register'])

@section('content')

<div class="card-header "><h3 class="text-center font-weight-light my-4">Register - 1</h3></div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {!! Session::get('err') !!}
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputEmail" name="email" type="text" placeholder="Email"
                value="{{old('email')}}" />
            <label for="inputEmail">Email</label>

            @error('email')
                <small class="text-danger">* {{$message}}</small>
                <script>
                    $('#inputEmail').addClass('is-invalid').removeClass('is-valid')
                </script>
            @enderror
        </div>

        <div class="d-flex align-items-center mt-4 mb-0">
            <button class="btn btn-primary btn-block" type="submit">Next <i class="fa fa-arrow-right"></i></button>
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
