<?php

class media{
    function index(){
        $data['title']='สื่อการสอน';
        $data['content']=view('ric/media');
        return view('_template/main',$data);
    }
}