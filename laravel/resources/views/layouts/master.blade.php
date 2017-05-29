<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('src/css/main.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::secure('src/css/main.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
          @yield('style')
        </style>
    </head>
    <body>
      @include('includes.header')
        <div class="flex-center position-ref full-height">

            <div class="main content">
              @yield('content')
            </div>

        </div>
    </body>
</html>
