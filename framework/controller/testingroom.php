<?php

class testingroom{
    function index(){
        $data['title']='ห้องทดสอบ : Assessment Hub';
        $data['content']=view('ric/testingroom');
        return view('_template/main',$data);
    }

    function compilation(){
        $data['title']='ทดสอบประมวลความรู้รายวิชา : Compilation Evaluation';
        $data['content']=view('ric/testing_list',$data);
        return view('_template/main',$data);
    }

    function performance(){
        $data['title']='ทดสอบประเมินสมรรถนะวิชาชีพธุรกิจค้าปลีก : Performance Evaluation';
        $data['content']=view('ric/testing_list',$data);
        return view('_template/main',$data);
    }
}