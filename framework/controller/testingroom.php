<?php

class testingroom{
    function index(){
        $data['title']='ห้องทดสอบ : Assessment Hub';
        $data['content']=view('ric/testingroom');
        return view('_template/main',$data);
    }
}