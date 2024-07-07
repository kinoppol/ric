<?php
class user{
    function index(){
    }

    function logout(){
        unset($_SESSION['user']);
        $content=redirect(site_url('login'),2);
        $content.='กรุณารอสักครู่..';
        return $content;//view('template/authen',array('content'=>$content));
    }

    function view(){
        $data['content']='รายชื่อผู้ใช้';
        
        $menu=view('_menu/admin').view('_menu/budget');
        $data['menu']=$menu;
        $data['title']='จัดการผู้ใช้';
        return view('_template/main',$data);
    }

    
    function update_user_form(){
        $data['content']=view('user/update_user_form',["user" => $_SESSION["user"]]);
        $data['title']='แก้ไขข้อมูลส่วนตัว';
        return view('_template/main',$data);
    }

    function change_password_form(){
        $data['content']=view('user/change_password_form');
        $data['title']='เปลี่ยนรหัสผ่าน';
        return view('_template/main',$data);
    }
}