@extends('layouts.form-layouts', ['title' => 'add patient'])

@section('content')

<div class="card-header ">
    <h3 class="text-center font-weight-light my-4">Add Patient</h3>
</div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {{Session::get('err')}}
        </div>
    @endif
    <form method="POST" action="{{ route('patients.store') }}">
        @csrf
        <div class="row justify-content-between">
            <div class="col-md-6 col-12">
                <div class="form-floating mb-3 ">
                    <input class="form-control" id="inputFname" name="fname" type="text" placeholder="Frist Name"
                        value="{{old('fname')}}" />
                    <label for="inputFname">Frist Name</label>

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
                        value="{{old('lname')}}" />
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
            <input class="form-control" id="inputPhone" name="phone" type="text" placeholder="Phone"
                value="{{old('phone')}}" />
            <label for="inputPhone">Phone</label>

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
            <label for="inputPhone">Address</label>

            @error('address')
            <small class="text-danger">* {{$message}}</small>
            <script>
                $('#inputPhone').addClass('is-invalid').removeClass('is-valid')
            </script>
            @enderror
        </div>

        <div class="form-floating mb-3 ">
            <select class="form-control" name="clinic" id="inputClinic">
                <option value="">-- Choose Clinic --</option>
                @foreach (\App\Models\Clinic::all() as $clinic)
                    <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                @endforeach
            </select>
            <label for="inputClinic">Clinic</label>

            @error('clinic')
            <small class="text-danger">* {{$message}}</small>
            <script>
                $('#inputClinic').addClass('is-invalid').removeClass('is-valid')
            </script>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"></i> Add
            </button>

            <a class="btn btn-outline-dark" type="submit" href="{{route('patients.index')}}">
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
