<?php
class courses_teaching{
    
    function index(){
       
    }
    
    function forum($param){
        $courses=model('courses');
        $forum=model('forum');
        helper('base');
        $id=to10($param['c']);
        $courses_data=$courses->get_courses(['id'=>$id]);
        //$data['content']=$courses_data[0]['name'];
        $data['title']="ข้อมูลชั้นเรียน : ".$courses_data[0]['name'];
        $data['courses']=$courses_data[0];
        $data['cover']=view('courses/cover',$data);
        $topics=$forum->get(['courses_id'=>$id]);
        usort($topics, function ($a, $b) {
            return $a['createTime'] <=> $b['createTime'];
        });
        $topics=array_reverse($topics);

        $topic_data=array(
            'courses_id'=>$id,
            'topics'=>$topics,
        );
        $data['topic']=view('courses/forum',$topic_data);
        $data['navigator']='forum';
        $data['content']=view('courses/courses_layout',$data);
        return view('_template/main',$data);
    }

    
    function work($param){
        $courses=model('courses');
        $topic=model('topic');
        helper('base');
        $id=to10($param['c']);
        $courses_data=$courses->get_courses(['id'=>$id]);
        //$data['content']=$courses_data[0]['name'];
        $data['title']="บทเรียน : ".$courses_data[0]['name'];
        $data['courses']=$courses_data[0];
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
        $data['content']=view('courses/courses_layout',$data);
        return view('_template/main',$data);
    }

    function person($param){
        $courses=model('courses');
        helper('base');
        $id=to10($param['c']);
        $courses_data=$courses->get_courses(['id'=>$id]);
        //$data['content']=$courses_data[0]['name'];
        $data['title']="ผู้คนในชั้นเรียน : ".$courses_data[0]['name'];
        $data['courses']=$courses_data[0];
        $data['cover']=view('courses/cover',$data);
        $data['navigator']='person';
        $data['content']=view('courses/courses_layout',$data);
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

    function create_courses_topic(){
        helper('base');
        $topic=model('topic');
        $data=array(
            'courses_id'=>$_POST['courses_id'],
            'name'=>$_POST['topic_name'],
        );
        $id=$topic->create($data);
        //exit();
        return redirect(site_url('courses_teaching/work/c/'.toBase($_POST['courses_id'])));
    }

    
    function edit_courses_topic($param){
        $topic=model('topic');
        helper('base');
        $id=$param['id'];
        $courses_topic=$topic->get(['id'=>$id]);
        //$data['content']=$courses_data[0]['name'];
        $data['title']="แก้ไขบทเรียน : ".$courses_topic[0]['name'];
        $data['courses_topic']=$courses_topic[0];
        $data['content']=view('courses/courses_topic_edit',$data);
        return view('_template/main',$data);
    }

    function create_forum_topic(){
        helper('base');
        $forum=model('forum');
        $data=array(
            'courses_id'=>$_POST['courses_id'],
            'subject'=>$_POST['topic_subject'],
            'owner'=>$_SESSION['user']['id'],
            'createTime'=>date('Y-m-d H:i:s'),
        );
        $id=$forum->create($data);
        //exit();
        return redirect(site_url('courses_teaching/forum/c/'.toBase($_POST['courses_id'])));
    }
    
    
    function delete_topic($param){
        helper('base');
        $forum=model('forum');
        $data=array(
            'id'=>$param['id'],
        );
        $id=$forum->delete($data);
        //exit();
        return redirect(site_url('courses_teaching/forum/c/'.toBase($param['c'])));
    }
}