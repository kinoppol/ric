<?php
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