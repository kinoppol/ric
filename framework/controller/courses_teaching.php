<?php
class courses_teaching{
    
    function index(){
       
    }
    function my_courses(){
        $data['title']='ชั้นเรียนของฉัน';        
        $data['modal']=view('courses/courses_form',$data);
        $data['content']=view('courses/my_courses',$data);
        return view('_template/main',$data);
    }
    function my_courses_create(){
        $data['title']='สร้างชั้นเรียนใหม่';
        $data['content']=view('courses/courses_form',$data);
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