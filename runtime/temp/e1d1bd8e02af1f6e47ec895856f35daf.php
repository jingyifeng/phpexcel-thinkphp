<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\baobiao\public/../application/admin\view\yeji\gzlst.html";i:1503072027;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>待发工资列表</title>
    <link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
    <link rel="stylesheet" href="__ADMIN__/static/css/style.css">
    <link rel="icon" href="__ADMIN__/static/image/code.png">
</head>
<body class="body">


<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>待发工资列表 <a href="<?php echo url('yeji/index'); ?>" class="layui-btn layui-btn-small">业绩列表</a></legend>
</fieldset>
<div class="form">
    <form class="layui-form" action="<?php echo url('yeji/gzlst'); ?>" method="post" id="myform" style="float:right;">
        <div class="layui-form-item">
            <div class="layui-input-inline">
                <input class="layui-input" name="time" placeholder="请选择月份" onclick="layui.laydate({elem: this,format: 'YYYY-MM', festival: true})">
            </div>
            <button class="layui-btn" lay-submit lay-filter="formDemo">确认</button>
        </div>
    </form>
</div>
<table class="layui-table">
    <colgroup>
        <col width="30">
        <col width="200">
        <col>
        <col>
        <col>
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>ID</th>
        <td>姓名</td>
        <td>手机号</td>
        <th>业绩（元）</th>
        <th>提成（元）</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($yeji) || $yeji instanceof \think\Collection || $yeji instanceof \think\Paginator): $i = 0; $__LIST__ = $yeji;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['Id']; ?></td>
            <td><?php echo $vo['name']; ?></td>
            <td><?php echo $vo['phone']; ?></td>
            <td><?php echo $vo['yejihe']; ?></td>
            <td><?php echo $vo['gongzi']; ?></td>
            <td>
                <?php if($vo['state'] == 1): ?>
                <a href="<?php echo url('yeji/fafang',array('uid'=>$vo['uid'],'time'=>$vo['settime'])); ?>" class="layui-btn layui-btn-danger layui-btn-mini">发放工资</a>
                <?php endif; if($vo['state'] == 2): ?>
                <span class="layui-btn layui-btn-warm layui-btn-mini">工资已发放</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="6"><?php echo $yeji->render(); ?></td>
    </tr>
    </tbody>
</table>

<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__ADMIN__/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form','laydate'], function(){
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