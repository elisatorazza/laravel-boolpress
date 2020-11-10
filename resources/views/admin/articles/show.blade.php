@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Testo</th>
                <th scope="col">Abstract</th>
            </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{$article->title}}</td>
                        <td>{{$article->content}}</td>
                        <td>{{$article->abstract}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
    
@endsection