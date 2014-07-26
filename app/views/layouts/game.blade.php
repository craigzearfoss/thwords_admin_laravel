<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@yield('title') | Thwords</title>

    <!-- Viewport meta tag to prevent iPhone from scaling our page -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" href="/css/game.css"/>

    <!-- Normalize hide address bar for iOS and Android -->
    <script src="/js/hideaddressbar.js"></script>

    <!-- Add media query support for IE8 and under. Must place media queries in external stylesheet -->
    <script src="/js/respond.min.js"></script>

    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css" media="all">
    </style>

</head>
<body>

    @yield('content')

</body>
</html>