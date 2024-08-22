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
    function edit($param){
        $courses=model('courses');
        helper('base');
        $id=to10($param['c']);
        $courses_data=$courses->get_courses(['id'=>$id]);
        //$data['content']=$courses_data[0]['name'];
        $data['title']="แก้ไขชั้นเรียน : ".$courses_data[0]['name'];
        $data['courses']=$courses_data[0];
        $data['content']=view('courses/courses_edit',$data);
        return view('_template/main',$data);
    }
    function my_courses(){
        $data['title']='ชั้นเรียนของฉัน';        
        $courses=model('courses');
        $cond=array('owner'=>$_SESSION['user']['id'],'state'=>'ACTIVE');
        $courses_data=$courses->get_courses($cond);

        $data['modal']=view('courses/courses_form',$data);
        $data['courses']=$courses_data;
        $data['createLink']=true;
        $data['content']=view('courses/courses_list',$data);
        return view('_template/main',$data);
    }
    function courses_archived(){
        $data['title']='ชั้นเรียนที่เก็บ';     
        $courses=model('courses');
        $cond=array('owner'=>$_SESSION['user']['id'],'state'=>'ARCHIVED');
        $courses_data=$courses->get_courses($cond);

        $data['modal']=view('courses/courses_form',$data);
        $data['courses']=$courses_data;
        $data['createLink']=false;
        $data['content']=view('courses/courses_list',$data);
        return view('_template/main',$data);
    }
    function courses_browser(){
        $data['title']='ชั้นเรียนต้นแบบ';     
        $courses=model('courses');
        $cond=array('visibility'=>'PUBLIC','state'=>'ACTIVE');
        $courses_data=$courses->get_courses($cond);
        $data['courses']=$courses_data;
        $data['createLink']=false;
        $data['content']=view('courses/courses_list',$data);
        return view('_template/main',$data);
    }
    function my_courses_create(){
        $data['title']='สร้างชั้นเรียนใหม่';
        $data['content']=view('courses/courses_form',$data);
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
    
    function update_courses(){
        $data['name']=$_POST['courses_name'];
        $data['section']=$_POST['class_name'];
        $data['updateTime']=date('Y-m-d H:i:s');
        $data['cover_color']=$_POST['cover_color'];
        if(!empty($_POST['visibility'])&&$_POST['visibility']=='public'){
            $data['visibility']='PUBLIC';
        }else{
            $data['visibility']='PRIVATE';            
        }
        helper('base');
        $courses=model('courses');
        $courses->update($data,array('id'=>$_POST['courses_id']));
        $id=toBase($_POST['courses_id']);
        //exit();
        return redirect(site_url('courses_teaching/forum/c/'.$id));

    }
    
    function archive($param){
        $data['state']='ARCHIVED';
        $courses=model('courses');
        $courses->update($data,array('id'=>$param['c']));
        return redirect(site_url('courses_teaching/my_courses/'));
    }
    function active($param){
        $data['state']='ACTIVE';
        $courses=model('courses');
        $courses->update($data,array('id'=>$param['c']));
        helper('base');
        return redirect(site_url('courses_teaching/forum/c/'.toBase($param['c'])));
    }


    
}