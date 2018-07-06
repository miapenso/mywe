@extends('layouts.web')

@section('title', '后台管理系统')

@section('css')
    <link href="/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="/web/css/common.css" rel="stylesheet">
@endsection

@section('content')

    <div class="system-login" style="background-image: url('/web/images/bg-login.png');">
        <div class="head">
            <a href="/" class="logo-version">
                <span class="version hidden">VERSION</span>
            </a>
            <a href="/" class="pull-right">首页</a>
        </div>
        <div class="login-panel">
            <div class="title">
                <a href=""class="active">账号密码</a>
                <a href="#" clas="">手机</a>
            </div>
            <form action="" method="post" role="form" id="form1" onsubmit="return formcheck();" class="we7-form">
                <div class="input-group-vertical">
                    <input name="login_type" type="hidden" class="form-control " value="system">
                    <input name="username" type="text" class="form-control " placeholder="请输入用户名登录">
                    <input name="password" type="password" class="form-control password" placeholder="请输入登录密码">
                    <div class="input-group">
                        <input name="verify" type="text" class="form-control" placeholder="请输入验证码">
                        <a href="javascript:;" id="toggle" class="input-group-btn imgverify"><img id="imgverify" src="{php echo url('utility/code')}" title="点击图片更换验证码" /></a>
                    </div>

                </div>

                <!--
                 <div class="input-group-vertical">
                     <input name="login_type" type="hidden" class="form-control " value="mobile">
                     <input name="username" type="text" class="form-control " placeholder="请输入手机号登录">
                     <input name="password" type="password" class="form-control password" placeholder="请输入登录密码">
                     {if !empty($_W['setting']['copyright']['verifycode'])}
                     <div class="input-group">
                         <input name="verify" type="text" class="form-control" placeholder="请输入验证码">
                         <a href="javascript:;" id="toggle" class="input-group-btn imgverify"><img id="imgverify" src="{php echo url('utility/code')}" title="点击图片更换验证码" /></a>
                     </div>
                     {/if}
                 </div>
                 -->
                <div class="form-inline mb15" >
                    <div class="checkbox">
                        <input type="checkbox" value="true" id="rember" name="rember">
                        <label for="rember">记住用户名</label>
                    </div>
                </div>
                <div class="login-submit text-center">
                    <input type="submit" id="submit" name="submit" value="登录" class="btn btn-primary btn-block" />
                    <div class="">
                        <a href="#" class="color-default pull-left">立即注册</a>
                        <a href="#" class="color-default pull-right">忘记密码</a>
                        <div class="clear"></div>
                    </div>
                    <input name="token" value="" type="hidden" />
                </div>
                <div class="text-center">
                    <span class="color-gray">使用第三方账号登录</span>
                    <div class="form-control-static">
                        <a href="#qq"><img src="/web/images/qqlogin.png" width="35px"></a>&nbsp;&nbsp;
                        <a href="#wx"><img src="/web/images/wxlogin.png" width="35px"></a>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection


@section('js')
    <script type="text/javascript" src="/web/js/lib/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/web/js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="/web/js/app/util.js?v=20170915"></script>
    <script type="text/javascript" src="/web/js/app/common.min.js?v=20170915"></script>
    <script type="text/javascript" src="/web/js/require.js?v=20170915"></script>

    <script>
        function formcheck() {
            if($('#remember:checked').length == 1) {
                cookie.set('remember-username', $(':text[name="username"]').val());
            } else {
                cookie.del('remember-username');
            }
            return true;
        }
        var h = document.documentElement.clientHeight;
        $(".system-login").css('height',h);
    </script>
@endsection
