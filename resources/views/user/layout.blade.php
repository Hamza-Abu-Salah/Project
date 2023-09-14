<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="/assets/css/feathericon.min.css">

    <link rel="stylesheet" href="/assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .Sidebar- > ul > li {
            right: 0;
            left: auto;
            color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

@include('user.include.header')

@include('user.include.sidebar')

    @yield('content')

</div>
<!-- /Main Wrapper -->

@include('user.include.footer')

</body>
</html>
