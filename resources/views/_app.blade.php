<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="/css/app.css">

        <title>Queenstown Hockey League</title>

    </head>
    <body>
        <div id="app">

			@include('_icons')
			@include('_nav')

            @yield('content')
            
            @include('_footer')
		</div>
    </body>

	<script src="/js/app.js"></script>
</html>