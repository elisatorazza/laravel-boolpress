@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card" style="width: 80%">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                <h6 class="card-title">{{$article->user->name}}</h6>
                <p class="card-text">{{$article->content}}</p>
            </div>
        </div>
    </div>
</div>
@endsection