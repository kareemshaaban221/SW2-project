@extends('components.edit', ['employee' => 'patient'])

@section('edit')
<div class="form-floating mb-3 ">
    <select class="form-control" name="clinic" id="inputClinic">
        @foreach (\App\Models\Clinic::all() as $clinic)
            <option value="{{$clinic->id}}" @if ($user->patient->doctor->clinic->id == $clinic->id) selected @endif>{{$clinic->name}}</option>
        @endforeach
    </select>
    <label for="inputClinic">Clinic</label>

    @error('lname')
        <small class="text-danger">* {{$message}}</small>
        <script>
            $('#inputClinic').addClass('is-invalid').removeClass('is-valid')
        </script>
    @enderror
</div>
@endsection
