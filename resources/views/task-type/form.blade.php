@extends('layouts.main')
@section('container')

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
@if(isset($taskType))
<form method="POST" action="{{ URL::to('task-type/' . $taskType->id) }}">
    @method('put')
@else
<form method="POST" action="{{ URL::to('task-type') }}">
@endif
    @csrf
    <div class="row">
        <div class="col-12">
            <h5 class="form-title"><span>{{ $title }}</span></h5>
        </div>
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label for="name">Name <span class="login-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control  
                @error('name')is-invalid @enderror" value="{{ isset($taskType)? 
                $taskType->name : old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
            <a href="{{ URL::to('task-type/')  }}" class="btn  btn-secondary">Back</a>
        </div>
    </div>
</form>


@endsection