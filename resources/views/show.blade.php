@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{$creator->image}}" alt="Creator Pic">
            <div class="card-body">
                <h5 class="card-title">{{ $creator->name }}</h5>
                <h6 class="card-title">{{ $creator->subtitle }}</h6>
                <p class="card-text">{{$creator->description}}</p>
                <p class="card-text">{{$creator->state->state_name}}.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endsection
