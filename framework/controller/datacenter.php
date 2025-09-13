<?php

class datacenter{
    function index(){
        $data['title']='ศูนย์ข้อมูล';
        $data['content']=view('ric/datacenter');
        return view('_template/main',$data);
    }
}