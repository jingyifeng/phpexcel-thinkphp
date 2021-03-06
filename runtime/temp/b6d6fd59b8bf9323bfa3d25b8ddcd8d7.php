<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\baobiao\public/../application/admin\view\user\index.html";i:1503649562;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>表格</title>
    <link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
    <link rel="stylesheet" href="__ADMIN__/static/css/style.css">
    <link rel="icon" href="__ADMIN__/static/image/code.png">
</head>
<body class="body">


<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>员工列表 <a href="<?php echo url('user/add'); ?>" class="layui-btn layui-btn-small">添加员工</a> <a href="<?php echo url('user/leadingin'); ?>" class="layui-btn layui-btn-danger layui-btn-small">批量导入</a> <a href="<?php echo url('user/expuser'); ?>" class="layui-btn layui-btn-warm layui-btn-small">批量导出</a></legend>
</fieldset>

<table class="layui-table">
    <colgroup>
        <col width="30">
        <col width="100">
        <col width="60">
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
        <th>性别</th>
        <th>年龄</th>
        <th>提成(%)</th>
        <th>手机</th>
        <th>微信</th>
        <th>QQ</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $vo['Id']; ?></td>
        <td><?php echo $vo['name']; ?></td>
        <td><?php echo !empty($vo['sex'])?"女":"男"; ?></td>
        <td><?php echo $vo['age']; ?></td>
        <td><?php echo $vo['ticheng']; ?></td>
        <td><?php echo $vo['phone']; ?></td>
        <td><?php echo $vo['weixin']; ?></td>
        <td><?php echo $vo['qq']; ?></td>
        <td><?php echo !empty($vo['state'])?"在职":"离职"; ?></td>
        <td><a href="<?php echo url('user/edit',array('id'=>$vo['Id'])); ?>" class="layui-btn layui-btn-small layui-btn-danger">编辑</a> <a href="javascript:void();" class="layui-btn layui-btn-small layui-btn-warm del" data="<?php echo $vo['Id']; ?>">删除</a></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="10"><?php echo $user->render(); ?></td>
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