@extends('layouts.app', ['title' => $title])

@section('content')

@if (Session::has('done'))
    <div class="alert alert-success text-center position-absolute w-50 bg-transparent-success timer-5s" style="top: 15px; left: 25%">
        {{Session::get('done')}}
    </div>
@endif

<div class="card mb-4">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="w-auto">
                <i class="fas fa-table me-1"></i>
                {{ ucwords($title) }} Info.
            </div>
            @if (Auth::user()->role == 'receptionist')
            <div class="w-auto">
                <a href="{{route('patients.create')}}" class="btn btn-primary p-1 pt-0 pb-0" id="add" data-toggle="tooltip" title="Add New Patient">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            @endif
        </div>

    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    @if (Auth::user()->role == 'receptionist') <th>Actions</th> @endif
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    @if (Auth::user()->role == 'receptionist') <th>Actions</th> @endif
                </tr>
            </tfoot>
            <tbody>

                @foreach ($patients as $patient)
                    @if ($patient->user->id == Auth::user()->id)
                        @continue
                    @endif

                    <tr>
                        <td>
                            <a href="{{route('patients.show', $patient->user->username ? $patient->user->username : $patient->user->id)}}" class="text-decoration-none">
                                {{ucwords($patient->user->fname . ' ' . $patient->user->lname)}}
                            </a>
                        </td>
                        <td>{{$patient->user->email}}</td>
                        <td>{{$patient->user->phone}}</td>
                        @if (Auth::user()->role == 'receptionist')
                            <td>
                                <form action="{{route('patients.destroy', $patient->user->id)}}" method="POST" class="p-0">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure to complete this operation?')" type="submit" class="btn border-none text-danger p-0">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
