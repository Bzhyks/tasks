@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Priority</div>
                <div class="card-body">
                    <form action="{{route('priorities.update',$priority->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label class="form-label" for="">Priority</label>
                            <input type="text" class="form-contorl" for="" name="name" value="{{$priority->name}}">
                        </div>
                        <button class="btn btn-success">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection