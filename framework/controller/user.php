<?php

helper('database/mysql_helper');
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


    function change_password(){

        if(empty($_POST['current_password'])){
            return redirect(site_url('user/change_password_form'));
        }

        if($_POST['new_password'] != $_POST['confirm_password']){
            $_SESSION['response']['alert']['type']="danger";
            $_SESSION['response']['alert']['message']="รหัสผ่านใหม่ไม่ตรงกัน กรุณาตรวจสอบและลองอีกครั้ง!";
            return redirect(site_url('user/change_password_form'));
        }

        $model = model('user_model');
        $passwd = md5($_POST['current_password']);
        $user_data = $model->get($_SESSION['user']['id']);

        if($passwd != $user_data['password']){
            $_SESSION['response']['alert']['type']="danger";
            $_SESSION['response']['alert']['message']="รหัสผ่านปัจจุบันไม่ถูกต้อง กรุณาตรวจสอบและลองอีกครั้ง!";
            return redirect(site_url('user/change_password_form'));
        }

        $new_passwd = md5($_POST['new_password']);

        if(!$model->update($_SESSION['user']['id'],["password" => $new_passwd])){
            $_SESSION['response']['alert']['type']="danger";
            $_SESSION['response']['alert']['message']="เกิดปัญหาระหว่างเซิฟเวอร์ กรุณาลองอีกครั้งในภายหลัง";
            return redirect(site_url('user/change_password_form'));
        }

        $_SESSION['response']['alert']['type']="success";
        $_SESSION['response']['alert']['message']="เปลี่ยนรหัสผ่านเรียบร้อยแล้ว!";
        return redirect(site_url('user/change_password_form'));

    }

}