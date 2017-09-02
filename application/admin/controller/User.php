<?php
/**
 * Created by PhpStorm.
 * User: yifeng
 * Date: 2017/8/10
 * Time: 22:57
 */

namespace app\admin\controller;
class User extends Common
{
    //员工列表
    public function index(){
        $result=db('user')->order('Id Desc')->paginate(6);
        $this->assign('user',$result);
        return view();
    }
//    手动添加员工
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $validate=validate("User");
            if(!$validate->scene("add")->check($data)){
                $this->error($validate->getError());
            }
            $data['password']=md5('12345678');
            db('user')->insert($data);
            $this->success("员工添加成功",'user/index');
            return;
        }
        return view();
    }
    //修改员工信息
    public function edit(){
        if(request()->isPost()){
            $data=input("post.");
            $validate=validate("User");
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            if(db('user')->update($data)){
                $this->success("更新成功",'user/index');
            }else{
                $this->error("数据更新不成功",null,null,1);
            }

            return;
        }
        $id=input("id");
        $res=db('user')->where("Id",$id)->find();
        if(!$res){
            $this->error("该员工不存在","user/index");
        }
        $this->assign('user',$res);
        return view();
    }
//    删除
    public function del(){
         $id=input('id');
        if(!db('user')->delete($id)){
            $this->error('删除失败');
        }
        $this->success("删除成功",'user/index');
        return;
    }

    //批量导入员工信息
    public function leadingin(){
        if(request()->isPost()){
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('fileexcel');
            $fileinfo=$this->upload($file);
            if(!$fileinfo['code']){
                return json($fileinfo['info']);
            }
            //文档处理
            $inputFileType=\PHPExcel_IOFactory::identify($fileinfo['info']);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($fileinfo['info']);
            $sheet=$objPHPExcel->getSheet(0);
            $column=$sheet->getHighestColumn();
            $columns=\PHPExcel_Cell::columnIndexFromString($column);
            if($columns!=7 && $columns!=6){
                return json("数据格式不正确");
            }
            if($columns==7){
                $data=$this->getexceldateone($sheet);
            }
            if($columns==6){
                $data=$this->getexceldatetwo($sheet);
            }
            if(!db('user')->insertAll($data)){
                return json("数据导入异常");
            }
            if(file_exists($fileinfo['info'])){
                unlink($fileinfo['info']);
            }
            return json("数据导入成功");
        }
        return view();
    }
    protected function getexceldateone($sheet){
        //获取当前工作表的行数
        $rows=$sheet->getHighestRow();
        //获取当前工作表的列（在这里获取到的是字母列），
        $column=$sheet->getHighestColumn();
        $columns=\PHPExcel_Cell::columnIndexFromString($column);
        $field=['name','sex','age','phone','weixin','qq','state'];
        $data=[];
        for($row=2;$row<=$rows;$row++){
            $row_data=[];
            for($col=0;$col<$columns;$col++){
                $value=$sheet->getCellByColumnAndRow($col,$row)->getValue();
                if($field[$col]=="sex"){
                    $value=($value=="男")?0:1;
                }
                if($field[$col]=="state"){
                    $value=($value=="在职")?1:0;
                }
                $row_data[$field[$col]]=$value;
            }
            $row_data['password']=md5('12345678');
            $data[]=$row_data;
        }
        return $data;
    }
    protected function getexceldatetwo($sheet){
        //获取当前工作表的行数
        $rows=$sheet->getHighestRow();
        //获取当前工作表的列（在这里获取到的是字母列），
        $column=$sheet->getHighestColumn();
        $columns=\PHPExcel_Cell::columnIndexFromString($column);
        $field=['name','sex','age','phone','weixin','qq','state'];
        $data=[];
        for($row=2;$row<=$rows;$row+=3){
            $row_data=[];
            for($col=0;$col<$columns;$col++){
                $value=$sheet->getCellByColumnAndRow($col,$row)->getValue();
                if($col<3){
                    if($field[$col]=="sex"){
                        $value=($value=="男")?0:1;
                     }
                    $row_data[$field[$col]]=$value;
                }
                if($col==3) {
                    $row_data[$field[$col]]=$sheet->getCellByColumnAndRow($col+1,$row)->getValue();
                    $row_data[$field[$col+1]]=$sheet->getCellByColumnAndRow($col+1,$row+1)->getValue();
                    $row_data[$field[$col+2]]=$sheet->getCellByColumnAndRow($col+1,$row+2)->getValue();
                }
                if($col==5) {
                    $value=($value=="在职")?1:0;
                    $row_data[$field[$col+1]] =$value;
                }

            }
            $row_data['password']=md5('12345678');
            $data[]=$row_data;
        }
        return $data;
    }
    protected function upload($file)
    {
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        $msg=[];
        if($info){
            // 成功上传后 获取上传信息
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $msg['code']=1;
            $msg['info']=ROOT_PATH . 'public' . DS . 'uploads'.DS.$info->getSaveName();

        }else{
            // 上传失败获取错误信息
            $msg['code']=0;
            $msg['info']=$file->getError();
        }
        return $msg;
    }

//    批量导入
    public function expuser(){
        $phpexcel=new \PHPExcel();
        $phpexcel->setActiveSheetIndex(0);
        $sheet=$phpexcel->getActiveSheet();
        $res=db('user')->field("name,sex,age,phone,weixin,qq,ticheng,state")->select();
        $arr=[
            'name'=>"姓名",
            'sex'=>"性别",
            'age'=>"年龄",
            'phone'=>"手机号",
            'weixin'=>"微信",
            'qq'=>"QQ",
            'ticheng'=>"提成比例",
            'state'=>"状态",
        ];
        array_unshift($res,$arr);
        $currow=0;
        foreach ($res as $key=>$v){
            $currow=$key+1;
            $sheet->setCellValue('A'.$currow,$v['name'])
                ->setCellValue('B'.$currow,setsex($v['sex']))
                ->setCellValue('C'.$currow,$v['age'])
                ->setCellValue('D'.$currow,$v['phone'])
                ->setCellValue('E'.$currow,$v['weixin'])
                ->setCellValue('F'.$currow,$v['qq'])
                ->setCellValue('G'.$currow,$v['ticheng'])
                ->setCellValue('H'.$currow,setstate($v['state']));
        }
        $phpexcel->getActiveSheet()->getStyle('A1:H'.$currow)->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN);
        header('Content-Type: application/vnd.ms-excel');//设置文档类型
        header('Content-Disposition: attachment;filename="员工信表.xlsx"');//设置文件名
        header('Cache-Control: max-age=0');
        $phpwriter = new \PHPExcel_Writer_Excel2007($phpexcel);
        $phpwriter->save('php://output');
        return;
    }
}