@extends('layouts.form-layouts', ['title' => 'change salary'])

@section('content')

@if (Session::has('done'))
    <div class="alert alert-success text-center position-absolute w-50 bg-transparent-success timer-5s" style="top: 15px; left: 25%">
        {{Session::get('done')}}
    </div>
@endif

<div class="card-header ">
    <h3 class="text-center font-weight-light my-4">Change Salary</h3>
</div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {{Session::get('err')}}
        </div>
    @endif
    <form method="POST" action="{{ route('salaries.store') }}">
        @csrf
        <div class="form-floating mb-3 ">
            <select class="form-control" name="employee_id" id="inputEmployee">
                <option value="">-- Choose Employee --</option>

                @foreach (\App\Models\Employee::all() as $employee)
                    @if ($employee->user->username)
                        <option value="{{$employee->id}}">{{$employee->user->fname . ' ' . $employee->user->lname . ' | ' . $employee->user->phone}}</option>
                    @endif
                @endforeach
            </select>
            <label for="inputEmployee">Employee</label>

            @error('employee_id')
            <small class="text-danger">* {{$message}}</small>
            <script>
                $('#inputEmployee').addClass('is-invalid').removeClass('is-valid')

            </script>
            @enderror
        </div>

        <div class="form-floating mb-3 ">
            <input class="form-control" id="inputSalary" name="salary"
                cols="30" rows="10" placeholder="Salary" value="{{old('salary')}}" />
            <label for="inputSalary">Salary</label>

            @error('salary')
            <small class="text-danger">* {{$message}}</small>
            <script>
                $('#inputSalary').addClass('is-invalid').removeClass('is-valid')
            </script>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-edit"></i> Change Salary
            </button>

            <a class="btn btn-outline-dark" type="submit" href="{{route('home')}}">
                <i class="fa fa-users"></i> Home Page
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
