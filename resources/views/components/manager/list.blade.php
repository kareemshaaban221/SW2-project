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
            <div class="w-auto">
                <a href="{{route('managers.create')}}" class="btn btn-primary p-1 pt-0 pb-0" id="add" data-toggle="tooltip" title="Add New Manager">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($managers as $manager)
                    @if (!$manager->user->username)

                    <tr class="bg-danger">
                        <td class="text-light">Hasn't Registered Yet!</td>
                        <td class="text-light">{{$manager->user->email}}</td>
                        <td class="text-light">Hasn't Registered Yet!</td>
                        <td class="text-light">
                            <form action="{{route('managers.destroy', $manager->user->id . '&' . $manager->id)}}" method="POST" class="p-0">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure to complete this operation?')" type="submit" class="btn border-none text-light p-0">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @else

                    <tr>
                        <td>
                            <a href="{{route('managers.show', $manager->user->username)}}" class="text-decoration-none">
                                {{ucwords($manager->user->fname . ' ' . $manager->user->lname)}}
                            </a>
                            <a href="{{route('managers.edit', $manager->user->username)}}" class="m-2">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>{{$manager->user->email}}</td>
                        <td>{{$manager->user->phone}}</td>
                        <td>
                            <form action="{{route('managers.destroy', $manager->user->id . '&' . $manager->id)}}" method="POST" class="p-0">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure to complete this operation?')" type="submit" class="btn border-none text-danger p-0">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @endif
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<script>
    $('#add').tooltip();
</script>
@endsection
