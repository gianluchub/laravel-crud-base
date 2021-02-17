<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        
    </head>
    <body>
        <div class="container my-3">
            <h1>La nostra home page</h1>

            <section id="app">
                <input type="text" v-model="price">
                <button class="btn btn-primary" v-on:click="cerca">Cerca</button>
                <ul class="mt-4" v-if="books.length > 0">
                    <li v-for="book in books">
                        <h2>@{{ book.title }}</h2>
                        <small>@{{ book.author }}</small>
                        <small>@{{ book.price }}</small>
                    </li>
                </ul>
            </section>
        </div>
        

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
