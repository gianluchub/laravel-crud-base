@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Crea un nuovo libro</h1>
@endsection

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf    
        @method('POST')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{ old('title') }}">
            {{-- <input type="text" class="form-control @error('title') has-error @enderror" name="title" id="title" placeholder="@error('title'){{ $message }}@enderror"> --}}
        </div>
        {{-- @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
        <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Autore" value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Prezzo" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" value="{{ old('isbn') }}">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="6">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Indietro</a>
    </form>
@endsection