@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Task</div>
                <div class="card-body">
                    <form action="{{route('tasks.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Task Name</label>
                            <input type="text" class="form-control" for="" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Description</label>
                            <input type="text" class="form-control" for="" name="description">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Status</label>
                            <select name="status" class="form-select">
                                <option value="0">Created</option>
                                <option value="1">Processing</option>
                                <option value="2">Done</option>
                                <option value="3">Canceled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Priority</label>
                            <select name="priority_id" class="form-select">
                                @foreach ($priorities as $priority)
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
                        <button class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection