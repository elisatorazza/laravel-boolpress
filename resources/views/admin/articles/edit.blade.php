@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Inserisci il tuo articolo</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('admin.article.update', $article)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci titolo" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Inserisci slug" value="{{$article->slug}}">
        </div>
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{$article->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="abstract">Abstract</label>
            <textarea name="abstract" class="form-control" id="abstract" cols="30" rows="5">{{$article->abstract}}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" accept="image/*" class="form-input" id="image" name="image" placeholder="Inserisci immagine" value="{{$article->image}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
    
@endsection