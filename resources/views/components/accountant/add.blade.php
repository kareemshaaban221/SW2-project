@extends('layouts.form-layouts', ['title' => 'add accountant'])

@section('content')

<div class="card-header ">
    <h3 class="text-center font-weight-light my-4">Add Accountant</h3>
</div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {{Session::get('err')}}
        </div>
    @endif
    <form method="POST" action="{{ route('accountants.store') }}">
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

        <div class="form-floating mb-3 ">
            <select class="form-control" name="manager_id" id="inputManager" placeholder="Manager">
                <option>-- Choose Manager --</option>
                @foreach (App\Models\Manager::with('user')->get() as $manager)
                    <option value="{{$manager->id}}">{{$manager->user->fname}} | {{$manager->user->username}}</option>
                @endforeach
            </select>
            <label for="inputEmail">Manager</label>

            @error('manager_id')
            <small class="text-danger">* {{$message}}</small>
            <script>
                $('#inputManager').addClass('is-invalid').removeClass('is-valid')
            </script>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"></i> Add
            </button>

            <a class="btn btn-outline-dark" type="submit" href="{{route('accountants.index')}}">
                <i class="fa fa-users"></i> List Page
            </a>
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
