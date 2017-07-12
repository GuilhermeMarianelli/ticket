<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="{!! asset('dist/css/bootstrap.css') !!}">

	<script type="text/javascript" src="{!! asset('dist/js/jquery.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('dist/js/bootstrap.js') !!}"></script>
</head>
<body>
	@include('shared.navbar')
	@yield('content')
</body>
</html>