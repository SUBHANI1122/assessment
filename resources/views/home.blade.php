@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> All Feedback List <a href="{{ route('feedback.create')}}" class="btn btn-primary">Add New Feedback</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <form action="{{ route('products.index') }}" method="GET">
                        <input type="text" name="keyword" placeholder="Search by title" value="{{ request('keyword') }}">
                        <button type="submit">Search</button>
                    </form> --}}
                    {{-- {{ __('You are logged in!') }} --}}
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Added By</th>
                                @if (!Auth::user()->feedbackvote) <th colspan="2">Actions</th> @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedbacks as $value)
                            <tr>
                                <td>{{  $value->title }}</td>
                                <td>{{ $value->category->title }}</td>
                                <td>{{ $value->user->name }}</td>
                                @if(!Auth::user()->feedbackvote)
                                <td><i class='fa fa-thumbs-down thumbsDown' id="{{ $value->id }}" data-id="0"></i></td>
                                <td><i class='fa fa-thumbs-up thumbsUp' id="{{ $value->id }}" data-id="1"></i></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $( document ).ready(function() {
        $('.thumbsDown').on('click', function(){
            var feedbackId = this.id;
            var value = $(this).attr('data-id');
            $.ajax({
             type: "GET",
             dataType: "json",
             url: '/vote/feedback',
             data: {'feedbackId': feedbackId, 'value': value},
             success: function(data){
                if(data.success){
                    alert(data.success);
                    location.reload(true);
                }
             },
         });
        });
        $('.thumbsUp').on('click', function(){
            var feedbackId = this.id;
            var value = $(this).attr('data-id');
            $.ajax({
             type: "GET",
             dataType: "json",
             url: '/vote/feedback',
             data: {'feedbackId': feedbackId, 'value': value},
             success: function(data){
                if(data.success){
                    alert(data.success);
                    location.reload(true);
                }
             },
         });
        });
    });
</script>
@endsection
