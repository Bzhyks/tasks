@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Priorities list</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Priority</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($priorities as $priority)
                            <tr>
                                <td>{{$priority->name}}</td>
                                <td style="width: 100px;" <a class="btn btn-success" href="{{route('priorities.edit', $priority->id)}}">Edit</a>
                                <td style="width: 100px;">
                                    <form method="POST" action="{{route('priorities.destroy', $priority->id)}}"></form>
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger"> Delete</button>
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