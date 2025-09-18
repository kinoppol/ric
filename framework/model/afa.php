<?php

helper("model/dummy_model");
class afa extends dummy_model{
    protected $table = 'ask_for_advice';
    protected $primary_key = 'id';
    function __construct($db_ref){
        parent::__construct($db_ref);
    }
    function get($data=array()){
        $sql='select * from '.$this->table.' where '.arr2and($data);
        //print $sql;
        $result=$this->db->query($sql);

        $ask=array();
        while($a=$result->fetch_assoc()){
            $ask[$a['id']]=$a;
        }


            return $ask;
        
    }
    
    function get_available($user_id){
        $sql='select * from '.$this->table.' where (ask_id='.$user_id.' or teacher_id='.$user_id.') and book_time>"'.date('Y-m-d H:i:s',time()-300).' limit 1"';
        //print $sql;
        $result=$this->db->query($sql);

        
        $a=$result->fetch_assoc();


            return $a;
        
    }

    function create($data=array()){
        $sql='insert into '.$this->table.' set '.arr2set($data);
        //print $sql;
        $result=$this->db->query($sql);
        return $this->db->insert_id;
    }
    function update($data=array(),$where=array()){
        $sql='update '.$this->table.' set '.arr2set($data).' where '.arr2and($where);
        $result=$this->db->query($sql);
        return $result;
    }

    function delete($where=array()){
        $sql='delete from '.$this->table.' where '.arr2and($where);
        print $sql;
        $result=$this->db->query($sql);
        return $result;
    }

}