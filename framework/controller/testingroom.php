<?php

class testingroom{
    function index(){
        $data['title']='ห้องทดสอบ';
        $data['content']=view('ric/testingroom.php');
        return view('_template/main',$data);
    }
}