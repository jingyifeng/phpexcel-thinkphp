<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\phpStudy\WWW\baobiao\public/../application/admin\view\user\add.html";i:1502437763;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>表单</title>
    <link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
    <link rel="stylesheet" href="__ADMIN__/static/css/style.css">
    <link rel="icon" href="__ADMIN__/static/image/code.png">
</head>
<body class="body">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>添加员工 <a href="<?php echo url('user/index'); ?>" class="layui-btn layui-btn-small">员工列表</a></legend>
</fieldset>

<form class="layui-form" id="myform" method="post" action="<?php echo url('user/add'); ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-inline">
            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入姓名" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-block">
            <input type="radio" name="sex" value="0" title="男" checked>
            <input type="radio" name="sex" value="1" title="女">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-inline">
            <input type="text" name="age" lay-verify="required|number" value="20" placeholder="请输入年龄" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">提成比例</label>
        <div class="layui-input-inline">
            <input type="text" name="ticheng" lay-verify="required" placeholder="请输入提成比例" value="10" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">手机号</label>
        <div class="layui-input-inline">
            <input type="text" name="phone" lay-verify="phone"  placeholder="请输入手机号" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">微信号</label>
        <div class="layui-input-inline">
            <input type="text" name="weixin" placeholder="请输入微信号" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">QQ号</label>
        <div class="layui-input-inline">
            <input type="text" name="qq" placeholder="请输入QQ号" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="radio" name="state" value="1" title="在职" checked>
            <input type="radio" name="state" value="0" title="离职">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        </div>
    </div>
</form>

<script src="__PUBLIC__/js/jquery.min.js" charset="utf-8"></script>
<script src="__ADMIN__/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['form', 'layedit', 'laydate'], function(){
        // 操作对象
        var form = layui.form();
        //监听提交
        form.on('submit(demo1)', function(data){
            $("#myform").submit();
            return false;
        });

        // you code ...

    });
</script>
</body>
</html>