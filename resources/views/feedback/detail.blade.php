@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $feedback->title }}(Added by : {{ $feedback->user->name }})</div>

                <div class="card-body">
                 
                    {{ $feedback->description }}
                    
                </div>
                <div class="card-footer">
                    <i class='fa fa-thumbs-down' style="font-size:60px;"></i>
                    <i class='fa fa-thumbs-up' style="font-size:60px;"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new DataTable('#example');
</script>
@endsection
