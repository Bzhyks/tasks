@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Priority</div>
                <div class="card-body">
                    @include('priorities.error')
                    <form action="{{route('priorities.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Priority</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')  }}">
                        </div>
                        <button class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection