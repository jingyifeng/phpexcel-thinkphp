<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\baobiao\public/../application/index\view\index\add.html";i:1502890547;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>上报业绩</title>
    <link rel="stylesheet" href="__INDEX__/layui/css/layui.css">
    <link rel="stylesheet" href="__INDEX__/static/css/style.css">
    <link rel="icon" href="__INDEX__/static/image/code.png">
</head>
<body class="body">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>上报业绩 <a href="<?php echo url('index/index'); ?>" class="layui-btn layui-btn-small">业绩列表</a></legend>
</fieldset>

<form class="layui-form" id="myform" method="post" action="<?php echo url('index/add'); ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">业绩</label>
        <div class="layui-input-inline">
            <input type="text" name="yeji" lay-verify="required" autocomplete="off" placeholder="请输入业绩（单位：元）" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">业绩说明</label>
        <div class="layui-input-block">
            <textarea name="note" placeholder="请输入业绩说明" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        </div>
    </div>
</form>

<script src="__PUBLIC__/js/jquery.min.js" charset="utf-8"></script>
<script src="__INDEX__/layui/layui.js" charset="utf-8"></script>
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