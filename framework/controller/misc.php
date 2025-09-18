<?php

class misc{
    function index(){
        $user_model=model('user_model');
        $ask_for_advice=model('afa');
        $afa_data=$ask_for_advice->get_available($_SESSION['user']['id']);
        $teacher_data=$user_model->get_user(array('user_type_id'=>3));

        $teachers=array();
        foreach($teacher_data as $t){
            if(empty($t['name'])||empty($t['surname'])){
                continue;
            }
            $teachers[$t['id']]=$t['name'].' '.$t['surname'];
        }
        $data['teachers']=$teachers;
        $data['modal']=view('ric/ask_for_advice',$data);
        //print_r($afa_data);
        $data['afa_data']=$afa_data;
        $data['content']=view('ric/misc',$data);
        $data['title']='องค์ประกอบเสริม : Supporting Elements';
        return view('_template/main',$data);
    }

    function ask_for_advice(){
        $ask_for_advice=model('afa');
        $data=array(
            'ask_id'=>$_SESSION['user']['id'],
            'book_time'=>$_POST['date_book'].' '.$_POST['time_book'],
            'ask_time'=>date('Y-m-d H:i:s'),
            'teacher_id'=>$_POST['advisor'],
            'meet_link'=>'https://meet.google.com/lookup/'.generateRandomString(10),
        );
        $ask_for_advice->create($data);
        
        return redirect(site_url('misc'));

    }
}