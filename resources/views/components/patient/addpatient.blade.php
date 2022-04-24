@extends('layouts.form-layouts', ['title' => 'add patient'])

@section('content')

@if (Session::has('exists'))
<form action="{{ route('store.patient') }}" method="POST" class="d-none">
    @csrf
    <input type="text" name="email" value="{{old('email')}}">
    <input type="submit" name="" id="blabla" onclick="return confirm('The Email Is Already Token! Do You Want To Add A New Manager With This Email ?!')">
</form>

<script>
    $(document).ready(() => {
        document.getElementById('blabla').click()
    })
</script>
@endif

<div class="card-header ">
    <h3 class="text-center font-weight-light my-4">Add Patient</h3>
</div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {{Session::get('err')}}
        </div>
    @endif
    <form method="POST" action="{{ route('store.patient') }}">
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

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"></i> Add
            </button>
        </div>
    </form>
</div>

@if ($errors->any())
<script type="text/javascript">
    $('.form-control').each((i, elem) => {
        if (!elem.hasAttribute('disabled')) {
            if (!$(elem).hasClass('is-invalid'))
                $(elem).addClass('is-valid');
        }
    })

</script>
@endif
@endsection
