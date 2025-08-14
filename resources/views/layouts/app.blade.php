<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'AquaLogix')</title>
</head>
<body>
    <div style="max-width:600px;margin:50px auto;font-family:sans-serif;">
        <h1 style="text-align:center;">AquaLogix</h1>
        <hr>
        @yield('content')
    </div>
    @include('components.admin-toolbar')

</body>
</html>
