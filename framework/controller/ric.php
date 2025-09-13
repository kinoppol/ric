<?php
class ric{
    function datacenter(){
        $data['title']="ศูนย์ข้อมูล";
        $data['content']='ศูนย์ CVM';
        return view('_template/main',$data);
    }
}