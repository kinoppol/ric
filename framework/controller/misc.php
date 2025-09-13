<?php

class misc{
    function index(){
        $data['title']='องค์ประกอบเสริม';
        $data['content']=view('ric/mics.php');
        return view('_template/main',$data);
    }
}