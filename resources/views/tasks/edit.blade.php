@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Task</div>
                <div class="card-body">
                    @include('tasks.error')
                    <form action="{{route('tasks.update',$task->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label class="form-label" for="">Task</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $task->name)  }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description', $task->description)  }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Status</label>
                            <select name="status" class="form-select">
                                <option value="0" {{ ($task->status == "0")?'selected':''}}>Created</option>
                                <option value="1" {{ ($task->status == "1")?'selected':''}}>Processing</option>
                                <option value="2" {{ ($task->status == "2")?'selected':''}}>Done</option>
                                <option value="3" {{ ($task->status == "3")?'selected':''}}>Canceled</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Priority</label>
                            <select name="priority_id" class="form-select">
                                @foreach($priorities as $priority)
                                <option value="{{$priority->id}}">{{$priority->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">User</label>
                            <select name="user_id" class="form-select">
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection