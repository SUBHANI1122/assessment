@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Feedback Category</div>
                <div class="card-body">
                    <form action="{{ route('feedback_category.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection