<?php

class media{
    function index(){
        helper('base');
        $data['title']='สื่อการสอน : Learning Resources';

        $courses=model('courses');
        $user_model=model('user_model');
        $cond=array('state'=>'ACTIVE');
        $courses_data=$courses->get_courses($cond);

         $c_data=array();
        foreach($courses_data as $c){
            //print_r($c);
            $owner_data=$user_model->get_user(array('id'=>$c['owner']));
            $c['owner']=$owner_data[0];
            $c_data[]=$c;
        }
        //print_r($c_data);
        $data['courses']=$c_data;
        $data['content']=view('ric/media',$data);
        return view('_template/main',$data);
    }
}