@extends('layouts.web')

@section('title', '后台管理系统')

@section('css')
    <link href="/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="/web/css/common.css" rel="stylesheet">
@endsection

@section('content')

    <div class="system-login" style="background-image: url('/web/images/bg-login.png');" id="app">
        <div class="head">
            <a href="/" class="logo-version">
                <span class="version hidden">VERSION</span>
            </a>
            <a href="/" class="pull-right">首页</a>
        </div>
        <div class="login-panel">
            <div class="title">
                <a href="{{url('login/index')}}" v-bind:class="{ active: isSystem }">账号密码</a>
                <a v-if="mobile_status" v-bind:class="{ active: isMobile }" href="{{url('login/index',['mobile'])}}" >手机</a>
            </div>
            <form @submit.prevent="doLogin" action="" method="post" role="form" id="form1" onsubmit="return formcheck();" class="we7-form">

                <div v-if="isSystem" class="input-group-vertical">
                    <input v-model="inputtext.login_type" name="login_type" type="hidden" class="form-control " >
                    <input v-model="inputtext.username" name="username" type="text" class="form-control " placeholder="请输入用户名登录" >
                    <input v-model="inputtext.password" name="password" type="password" class="form-control password" placeholder="请输入登录密码">
                    <div v-if="isCode" class="input-group" >
                        <input v-model="inputtext.verify" name="verify" type="text" class="form-control" placeholder="请输入验证码">
                        <a href="javascript:;" id="toggle" class="input-group-btn imgverify">
                            <img id="imgverify" src="#" title="点击图片更换验证码" />
                        </a>
                    </div>

                </div>


                 <div v-if="isMobile" class="input-group-vertical">

                     <input v-model="inputtext.login_type" name="login_type" type="hidden" class="form-control " value="mobile">
                     <input v-model="inputtext.username" name="username" type="text" class="form-control " placeholder="请输入手机号登录">
                     <input v-model="inputtext.password" name="password" type="password" class="form-control password" placeholder="请输入登录密码">

                     <div v-if="isCode" class="input-group">
                         <input v-model="inputtext.verify" name="verify" type="text" class="form-control" placeholder="请输入验证码">
                         <a href="javascript:;" id="toggle" class="input-group-btn imgverify">
                             <img id="imgverify" src="{php echo url('utility/code')}" title="点击图片更换验证码" />
                         </a>
                     </div>
                 </div>

                <div class="form-inline mb15" >
                    <div class="checkbox">
                        <input v-model="inputtext.rember" type="checkbox" value="true" id="rember" name="rember">
                        <label for="rember">记住用户名</label>
                    </div>
                </div>
                <div class="login-submit text-center">
                    <input name="token" value="" type="hidden" />
                    <input type="submit" id="submit" name="submit" value="登录" class="btn btn-primary btn-block" />
                    <div class="">
                        <a v-if="ifRegisterOpen" href="{{url('/register')}}" class="color-default pull-left">立即注册</a>
                        <a href="{{url('/forget')}}" class="color-default pull-right">忘记密码</a>
                        <div class="clear"></div>
                    </div>
                </div>
                <div v-if="isThirdlogin" class="text-center">
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
<script type="text/javascript" src="/js/vue.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            inputtext : {},
            isSystem : {{$login_type == 'system' ? 'true' :'false' }},
            isMobile : {{$login_type == 'mobile' ? 'true' :'false' }},
            isCode : {{isset($coreSetting['copyright']['verifycode']) && !empty($coreSetting['copyright']['verifycode'])?'true':'false'}},
            mobile_status : {{isset($coreSetting['copyright']['mobile_status']) && !empty($coreSetting['copyright']['mobile_status'])?'true':'false'}},
            isThirdlogin : {{isset($coreSetting['thirdlogin']['qq']['authstate']) && !empty($coreSetting['thirdlogin']['qq']['authstate'])?'true':'false'}},
            ifRegisterOpen : {{isset($coreSetting['register']['open']) && !empty($coreSetting['register']['open'])?'true':'false'}},
        },
        methods : {
            doLogin : function (event) {
                console.log(this.inputtext);
            }
        }
    })

    var h = document.documentElement.clientHeight;
    $(".system-login").css('height',h);

    function formcheck() {
        if($('#rember:checked').length == 1) {
            console.log('记住密码');
        } else {
            console.log('忘记密码');
        }
        return true;
    }
</script>
@endsection