<?php
class courses_teaching{
    
    function index(){
       
    }
    function my_courses(){
        $data['content']='ชั้นเรียนของฉัน';
        $data['title']='ชั้นเรียนของฉัน';
        return view('_template/main',$data);
    }
    function courses_browser(){
        $data['content']='ค้นหาชั้นเรียนต้นแบบ';
        $data['title']='ค้นหาชั้นเรียนต้นแบบ';
        return view('_template/main',$data);
    }
    function courses_achive(){
        $data['content']='ชั้นเรียนที่เก็บ';
        $data['title']='ชั้นเรียนที่เก็บ';
        return view('_template/main',$data);
    }
}