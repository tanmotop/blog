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
<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- start logo -->
                <a class="branding" href="/">
                    <img src="/images/logo.png">
                </a>
                <!-- end logo -->
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse justify-content-md-center collapse" id="main-menu" style="">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">首页 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">PHP</a>
            </li>
        </ul>
    </div>
</nav>

<main>
    <div class="py-5">
        <div class="container">
            <div class="row">

                @yield('content')

            </div>
        </div>
    </div>
</main>

<footer class="footer" id="footer">
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span>Copyright © <a href="http://blog.tanmo.top">黑将军(Tanmo)</a></span> |
                    <span>闽ICP备15003963号-1</span>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>