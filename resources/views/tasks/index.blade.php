@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tasks list</div>
                <div class="card-body">
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