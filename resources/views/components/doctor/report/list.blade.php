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
                {{ ucwords($title) }}
            </div>
            <div class="w-auto">
                <a href="{{route('reports.create')}}" class="btn btn-primary p-1 pt-0 pb-0" id="add" data-toggle="tooltip" title="Create Report">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Report</th>
                    <th>Patient Full Name</th>
                    <th>Patient Phone</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Report</th>
                    <th>Patient Full Name</th>
                    <th>Patient Phone</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($patients as $patient)

                    <tr>
                        <td>{{$patient->report}}</td>
                        <td>
                            <a href="{{route('patients.show', $patient->user->username ? $patient->user->username : $patient->user->id)}}" class="text-decoration-none">
                                {{ucwords($patient->user->fname . ' ' . $patient->user->lname)}}
                            </a>
                        </td>
                        <td>{{$patient->user->phone}}</td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
