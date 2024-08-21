<?php
class courses_teaching{
    
    function index(){
       
    }
    
    function forum($param){
        $courses=model('courses');
        helper('base');
        $id=to10($param['c']);
        $courses_data=$courses->get_courses(['id'=>$id]);
        //$data['content']=$courses_data[0]['name'];
        $data['title']="ข้อมูลชั้นเรียน : ".$courses_data[0]['name'];
        $data['courses']=$courses_data[0];
        $data['content']=view('courses/forum',$data);
        return view('_template/main',$data);
    }
    function my_courses(){
        $data['title']='ชั้นเรียนของฉัน';        
        $courses=model('courses');
        $courses_data=$courses->get_courses(['owner'=>$_SESSION['user']['id']]);

        $data['modal']=view('courses/courses_form',$data);
        $data['courses']=$courses_data;
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
    function create_courses(){
        $data['name']=$_POST['courses_name'];
        $data['section']=$_POST['class_name'];
        $data['state']='ACTIVE';
        $data['owner']=$_SESSION['user']['id'];
        $data['creationTime']=date('Y-m-d H:i:s');
        $data['updateTime']=date('Y-m-d H:i:s');
        $data['publicationTime']=date('Y-m-d H:i:s');
        $courses=model('courses');
        $courses_id=$courses->create($data);
        return redirect(site_url('courses_teaching/forum/c/'.$courses_id));

    }

    
}