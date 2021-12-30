<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body class="antialiased">
        <h2 class="text-3xl font-bold">
            Conexa
          </h2>
        <div id="app">
            <router-view/>
        </div>        
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
