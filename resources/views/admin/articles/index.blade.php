@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            @if (session()->has('success'))
            <div class="alert alert-success">
                @if(is_array(session('success')))
                    <ul>
                        @foreach (session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ session('success') }}
            @endif
        </div>
        @endif
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
                        <td>
                            <form action="{{route('admin.article.destroy', $article)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection