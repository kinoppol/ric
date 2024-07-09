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
    function edit_user_form($param){
        $model = model('user_model');

        if(empty($param['id'])){
            return view('_error/error404');
        }

        $user = $model->get($param['id']);
        
        if(empty($user)){
            return view('_error/error404');
        }

        $data['title'] = 'แก้ไขข้อมูลส่วนตัว';
        $data['content'] = view('management/edit_user_form', ["user" => $user]);
        return view('_template/main', $data);
    }

    function edit_user(){
        $model = model('user_model');

        $data = [
            "name" => ($_POST['name'] ?? ''),
            "surname" => ($_POST['surname'] ?? ''),
            "email" => ($_POST['email'] ?? '')
        ];
        if(!empty($_POST['new_password'])) {
            $data['password'] = md5($_POST['new_password']);
        }

        if($_FILES["fileToUpload"]['size'] > 0){
            if(!$model->update_avatar($_POST['id'],$_FILES["fileToUpload"])){
                $_SESSION['response']['alert']['type'] = 'danger';
                $_SESSION['response']['alert']['message'] = $model->error();
                return redirect(site_url('management/edit_user_form/id/'.$_POST['id']));
            }
        }

        if(!$model->update_user($_POST['id'],$data))
        {
            $_SESSION['response']['alert']['type'] = 'danger';
            $_SESSION['response']['alert']['message'] = $model->error();
            return redirect(site_url('management/edit_user_form/id/'.$_POST['id']));
        }

        # Update user session if update own account
        if($_POST['id'] == $_SESSION['user']['id']){
            $_SESSION['user'] = $model->get($_SESSION['user']['id']);
        }
        #---
        
        $_SESSION['response']['alert']['type'] = 'success';
        $_SESSION['response']['alert']['message'] = 'บันทึกข้อมูลเสร็จสิ้น!';
        return redirect(site_url('management/edit_user_form/id/'.$_POST['id']));
    }
}