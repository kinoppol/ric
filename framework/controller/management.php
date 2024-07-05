<?php
class management{
    function index(){
    }

    function list_user(){
        $data['content']=view('admin/list_user');
        $data['title']='รายชื่อผู้ใช้';
        return view('_template/main',$data);
    }

    function user_type(){
        $data['content']=view('admin/user_type');
        $data['title']='รายชื่อผู้ใช้';
        return view('_template/main',$data);
    }
}