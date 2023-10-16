@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Feedback</div>

                <div class="card-body">
                    <form action="{{ route('feedback.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Select Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row">
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