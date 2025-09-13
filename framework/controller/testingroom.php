<?php

class testingroom{
    function index(){
        $data['title']='ห้องทดสอบ';
        $data['content']=view('ric/testingroom');
        return view('_template/main',$data);
    }
}