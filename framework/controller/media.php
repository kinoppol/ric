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
    function list($param){
        $courses=model('courses');
        $topic=model('topic');
        $meet=model('meet');
        $user_model=model('user_model');
        helper('base');
        $id=to10($param['c']);
        $meet_link=$meet->get(array('courses_id'=>$id));
        $courses_data=$courses->get_courses(['id'=>$id]);
        //$data['content']=$courses_data[0]['name'];
        $owner_data=$user_model->get_user(array('id'=>$courses_data[0]['owner']));
        $data['title']="สื่อการสอนรายวิชา : ".$courses_data[0]['name'];
        $data['courses']=$courses_data[0];
        $data['owner']=$owner_data[0];
        $data['cover']=view('courses/cover',$data);

        $data['modal']=view('courses/lesson_form',$data);

        
        $topics=$topic->get(['courses_id'=>$id]);
        /*
        usort($topics, function ($a, $b) {
            return $a['createTime'] <=> $b['createTime'];
        });
        */
        //$topics=array_reverse($topics);

        $topic_data=array(
            'courses_id'=>$id,
            'topics'=>$topics,
        );

        $data['topic']=view('courses/lesson',$topic_data);
        $data['navigator']='work';
        $data['meet_url']=count($meet_link)>0?$meet_link[0]['meet_link']:'';
        $data['content']=view('ric/media_layout',$data);
        return view('_template/main',$data);
    
    }
}