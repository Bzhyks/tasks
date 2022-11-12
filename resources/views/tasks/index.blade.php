@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tasks list</div>
                <div class="card-body">
                    <form action="{{ route('tasks.search') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="search" placeholder="Enter text for search" value="{{ $search }}">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="{{ route('tasks.filter') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <select class="form-select" name="filter_priority">
                                    <option value="" {{ ($filter_priority==null)?'selected':'' }}>-</option>
                                    @foreach($priorities as $priority)
                                    <option value="{{ $priority->id }}" {{ ($priority->id==$filter_priority)?'selected':'' }}>{{ $priority->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                            <div class="col-md-1">
                                <a href="{{ route('tasks.search.reset') }}" class="btn btn-warning">Clear</a>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->status}}</td>
                                <td>{{$task->priority->name}}</td>
                                <td>
                                    <a href="{{ route('tasks.edit',$task->id)}}" class="btn btn-success">Edit</a>
                                </td>


                                <td style="width: 100px;">
                                    <form method="POST" action="{{route('tasks.destroy', $task->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger"> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection