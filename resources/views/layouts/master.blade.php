<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Emulib - @yield('title')</title>
       	<!-- Include Bootstrap CSS -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		@yield('local_css')
    </head>
    <body>
        @yield('content')

        <!-- Include Jquery 2.2.4 -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    	<!-- Include Bootstrap JS -->
    	<script src="{{asset('js/bootstrap.min.js')}}"
    	<!-- Allow templates to include JS that may rely on jquery as a prerequesite -->
    	@yield('local_js')
    </body>
</html>
