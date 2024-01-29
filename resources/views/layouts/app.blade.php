<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>@yield('title') | Binus University</title>

	<link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
	@vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
	@yield('content')
</body>

</html>