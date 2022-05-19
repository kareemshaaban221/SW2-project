@extends('layouts.form-layouts', ['title' => 'create report'])

@section('content')

@if (Session::has('done'))
    <div class="alert alert-success text-center position-absolute w-50 bg-transparent-success timer-5s" style="top: 15px; left: 25%">
        {{Session::get('done')}}
    </div>
@endif

<div class="card-header ">
    <h3 class="text-center font-weight-light my-4">Create Medical Report</h3>
</div>
<div class="card-body ">
    @if (Session::has('err'))
        <div class="alert alert-danger">
            {{Session::get('err')}}
        </div>
    @endif
    <form method="POST" action="{{ route('reports.store') }}">
        @csrf
        <div class="form-floating mb-3 ">
            <select class="form-control" name="patient_id" id="inputPatient">
                <option value="">-- Choose Patient --</option>

                @foreach (Auth::user()->role == 'doctor' ? Auth::user()->employee->doctor->patients : [] as $patient)
                    <option value="{{$patient->id}}">{{$patient->user->fname . ' ' . $patient->user->lname . ' | ' . $patient->user->phone}}</option>
                @endforeach
            </select>
            <label for="inputPatient">Patient</label>

            @error('patient_id')
            <small class="text-danger">* {{$message}}</small>
            <script>
                $('#inputPatient').addClass('is-invalid').removeClass('is-valid')

            </script>
            @enderror
        </div>

        <div class="form-floating mb-3 ">
            <select class="form-control" name="status" id="inputStatus">
                <option value="">-- Choose Status --</option>
                @foreach (App\Models\Patient::getStatuses() as $status)
                    <option value="{{$status}}">{{$status}}</option>
                @endforeach
            </select>
            <label for="inputStatus">Patient General Status</label>

            @error('status')
            <small class="text-danger">* {{$message}}</small>
            <script>
                $('#inputStatus').addClass('is-invalid').removeClass('is-valid')
            </script>
            @enderror
        </div>

        <div class="form-floating mb-3 ">
            <textarea class="form-control" id="inputReport" name="report"
                cols="30" rows="10" placeholder="Report">{{old('report')}}</textarea>
            <label for="inputReport">Report</label>

            @error('report')
            <small class="text-danger">* {{$message}}</small>
            <script>
                $('#inputReport').addClass('is-invalid').removeClass('is-valid')

            </script>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"></i> Create Report
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
