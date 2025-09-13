<?php

class misc{
    function index(){
        $data['title']='องค์ประกอบเสริม';
        $data['content']=view('ric/misc');
        return view('_template/main',$data);
    }
}