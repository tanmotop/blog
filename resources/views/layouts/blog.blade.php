<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>博客 - 黑将军(Tanmo)</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/css/prism.css">
    <link rel="stylesheet" href="/css/markdown.css">

    <script src="/js/jquery.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/prism.js"></script>
</head>
<body class="home-template">

@include('header')

@include('nav')

<main>
    <div class="py-5">
        <div class="container">
            <div class="row">

                @yield('content')

            </div>
        </div>
    </div>
</main>

@include('footer')
</body>
</html>