<?php
class management{
    function index(){
    }

    function list_user(){
        $userModel=model('user_model');
        $ud=$userModel->get_user(1);
        $ut=$userModel->get_user_type(1);
        $user_type=array();
        foreach($ut as $t){
            $user_type[$t['id']]=$t;
        }
        $data['content']=view('admin/list_user',['userdata'=>$ud,'user_type'=>$user_type]);
        $data['title']='รายชื่อผู้ใช้';
        return view('_template/main',$data);
    }

    function user_type(){
        $data['content']=view('admin/user_type');
        $data['title']='ประเภทผู้ใช้';
        return view('_template/main',$data);
    }
}