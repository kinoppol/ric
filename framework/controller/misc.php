<?php

class misc{
    function index(){
        $data['title']='องค์ประกอบเสริม : Supporting Elements';
        $data['content']=view('ric/misc');
        return view('_template/main',$data);
    }
}