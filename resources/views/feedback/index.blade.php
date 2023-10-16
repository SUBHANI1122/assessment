@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> My  Feedback List <a href="{{ route('feedback.create')}}" class="btn btn-primary">Add New Feedback</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Added By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($my_feedbacks as $value)
                            <tr>
                                <td>{{  $value->title }}</td>
                                <td>{{ $value->category->title }}</td>
                                <td>{{ $value->user->name }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new DataTable('#example');
</script>
@endsection
