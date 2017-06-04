<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::to('/css/admin/main.css') }}" type="text/css">
        @yield('styles')
    </head>
    <body>
      <div class="full-height">
        @include('includes.admin.header')

            <div class="main content">
                @yield('content')
            </div>

      </div>
      <script type="text/javascript">
        var baseUrl = "{{ Url::to('/')}}";
      </script>
      @yield('scripts')
    </body>
</html>
