<?php

class media{
    function index(){
        $data['title']='สื่อการสอน';
        $data['content']=view('ric/media.php');
        return view('_template/main',$data);
    }
}