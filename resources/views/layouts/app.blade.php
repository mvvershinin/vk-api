<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.header')
<body>

@yield('content')
<script src="{{ asset('/js/app.js?v=1.0') }}"></script>
<script src="{{ asset('/js/script.js?v=1.0') }}"></script>

</body>
</html>
