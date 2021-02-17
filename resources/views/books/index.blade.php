@extends('layouts.main')

@section('header')
    <h1 class="mt-5">I nostri libri</h1>
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Prezzo</th>
                {{-- <th>Descrizione</th> --}}
                {{-- <th>ISBN</th> --}}
                <th>Creato il</th>
                <th>Aggiornato il</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ number_format($book->price, 2) }}</td>
                    {{-- <td>{{ substr($book->description, 0, 10)."..." }}</td> --}}
                    {{-- <td>{{ $book->isbn }}</td> --}}
                    <td>{{ $book->created_at }}</td>
                    <td>{{ $book->updated_at }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-outline-light"><i class="fas fa-search-plus"></i></a>    
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-light"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-light"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach      
        </tbody>
    </table>
@endsection

@section('footer')
    <div class="text-right">
        <a href="{{ route('books.create') }}" class="btn btn-lg btn-primary">Crea un nuovo libro</a>
    </div>
@endsection