@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Dettaglio libro</h1>
@endsection

@section('content')
    <table class="table table-dark table-striped table-bordered">
        @foreach ($book->getAttributes() as $key => $value)
            <tr>
                <td><strong>{{ $key }}</strong></td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    <div class="text-right">
        <a href="{{ route('books.index') }}" class="btn btn-lg btn-primary">Torna all'elenco libri</a>
    </div>
@endsection