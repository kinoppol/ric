<?php

class datacenter{
    function index(){
        $data['title']='ศูนย์ข้อมูล : Infomation Hub';
        $data['content']=view('ric/datacenter');
        return view('_template/main',$data);
    }
}