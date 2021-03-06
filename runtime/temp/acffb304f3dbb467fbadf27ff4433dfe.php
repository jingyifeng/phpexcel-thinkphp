<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\phpStudy\WWW\baobiao\public/../application/admin\view\login\index.html";i:1502026774;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>登录</title>
    <link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
    <link rel="stylesheet" href="__ADMIN__/static/css/style.css">
    <link rel="icon" href="__ADMIN__/static/image/code.png">
</head>
<body>

<div class="login-main">
    <header class="layui-elip">后台登录</header>
    <form class="layui-form" id="myform" method="post" action="<?php echo url('login/login'); ?>">
        <div class="layui-input-inline">
            <input type="text" name="username" required lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-input-inline">
            <input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-input-inline login-btn">
            <button type="submit" class="layui-btn" lay-submit lay-filter="formDemo">登录</button>
        </div>
    </form>
</div>

<script src="__PUBLIC__/js/jquery.min.js"></script>
<script src="__ADMIN__/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form'], function () {

        var form = layui.form();

        //监听提交
        form.on('submit(formDemo)', function(data){
            $("#myform").submit();
            return false;
        });

    });
</script>
</body>
</html>