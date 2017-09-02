<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\baobiao\public/../application/admin\view\yeji\index.html";i:1503326933;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>业绩列表</title>
    <link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
    <link rel="stylesheet" href="__ADMIN__/static/css/style.css">
    <link rel="icon" href="__ADMIN__/static/image/code.png">
</head>
<body class="body">


<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>业绩列表 <a href="<?php echo url('yeji/lst'); ?>" class="layui-btn layui-btn-small">待审核</a></legend>
</fieldset>

<table class="layui-table">
    <colgroup>
        <col width="30">
        <col width="200">
        <col>
        <col>
        <col>
        <col>
        <col>
        <col>
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>手机号</th>
        <th>业绩（元）</th>
        <th>业绩说明</th>
        <th>上报时间</th>
        <th>状态</th>
        <th>操作时间</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($yeji) || $yeji instanceof \think\Collection || $yeji instanceof \think\Paginator): $i = 0; $__LIST__ = $yeji;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['Id']; ?></td>
            <td><?php echo $vo['name']; ?></td>
            <td><?php echo $vo['phone']; ?></td>
            <td><?php echo $vo['yeji']; ?></td>
            <td><?php echo $vo['note']; ?></td>
            <td><?php echo date("Y/m/d H:i:s",$vo['uptime']); ?></td>
            <td><?php echo getstate($vo['state']); ?></td>
            <td><?php if($vo['settime'] != ''): ?><?php echo date("Y/m/d H:i:s",$vo['settime']); endif; ?></td>
        </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="8"><?php echo $yeji->render(); ?></td>
    </tr>
    </tbody>
</table>

<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__ADMIN__/layui/layui.js"></script>
<script type="text/javascript">
    // you code ...
    $('.del').on('click',function () {
        var id=$(this).attr('data');
        layui.use('layer', function(){
            var layer = layui.layer;
            layer.confirm('确定要删除该员工吗?', {icon: 3, title:'温馨提示'}, function(index){
                //do something
                location.href="<?php echo url('user/del'); ?>?id="+id;
                layer.close(index);
            });
        });
    })

</script>
</body>
</html>