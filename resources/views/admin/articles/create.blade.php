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
    <form action="{{route('admin.article.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci titolo">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Inserisci slug">
        </div>
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="abstract">Abstract</label>
            <textarea name="abstract" class="form-control" id="abstract" cols="30" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" accept="image/*" class="form-input" id="image" name="image" placeholder="Inserisci immagine">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
    
@endsection