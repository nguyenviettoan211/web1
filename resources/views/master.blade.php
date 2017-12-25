<!doctype html>
<html lang="en">
<head>
@include('css')
</head>
<body>
@include('announcement')
@include('error')
<!--BEGIN HEADER-->
@include('header')
<!--END HEADER-->
<!--BEGIN CONTENT-->
@yield('content')
<!--END CONTENT-->
<!--BEGIN FOOTER-->
@include('footer')
<!--END FOOTER-->
<!--BEGIN JS-->
@include('js')
<!--END JS-->


</body>
</html>
