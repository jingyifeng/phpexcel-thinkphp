<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\WWW\baobiao\public/../application/admin\view\report\mingxi.html";i:1503328400;}*/ ?>
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
    <legend>员工月份业绩明细表报</legend>
</fieldset>

<form class="layui-form" id="myform" method="post" action="<?php echo url('report/mingxi'); ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">请选择员工</label>
        <div class="layui-input-inline">
            <select name="uid" lay-verify="required">
                <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['Id']; ?>"><?php echo $vo['name']; ?>-<?php echo $vo['phone']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">请选择月份</label>
        <div class="layui-input-inline">
            <input class="layui-input" name="time" placeholder="请选择月份" onclick="layui.laydate({elem: this,format: 'YYYY-MM', festival: true})">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">导出报表</button>
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