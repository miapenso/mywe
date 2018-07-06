<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="keywords" content="后台管理系统" />
    <meta name="description" content="后台管理系统" />

    <link href="/web/css/layout.css" rel="stylesheet">
    @yield('css')
</head>
<body>

@yield('content')

<div class="container-fluid footer text-center" role="footer">
    <span class="friend-link">
        <a href="http://www.we7.cc">微信开发</a>&nbsp;&nbsp;
        <a href="http://s.we7.cc">微信应用</a>&nbsp;&nbsp;
        <a href="http://bbs.we7.cc">微擎论坛</a>&nbsp;&nbsp;
        <a href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&amp;key=XzkzODAwMzEzOV8xNzEwOTZfNDAwMDgyODUwMl8yXw">联系客服</a>
    </span>
    <span>Powered by <a href="http://www.we7.cc" target="_blank"><b>微擎</b></a> v1.6.7 © 2014-2015 <a href="http://www.we7.cc" target="_blank">www.we7.cc</a></span>
</div>

</body>
</html>

<script type="text/javascript" src="/web/js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/web/js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="/web/js/app/util.js"></script>
@yield('js')