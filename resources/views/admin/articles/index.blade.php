@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">User_id</th>
                <th scope="col">Abstract</th>

            </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{$article->title}}</td>
                        <td>{{$article->user_id}}</td>
                        <td>{{$article->abstract}}</td>
                        <td><a href="{{route('admin.article.show', $article)}}">Details</a></td>
                        <td><a href="{{route('admin.article.edit', $article)}}">Edit</a></td>
                        <td><a href="{{route('admin.article.destroy', $article)}}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection