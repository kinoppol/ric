<?php

helper("model/dummy_model");
class user_model extends dummy_model{
    protected $table = 'user_data';
    protected $primary_key = 'id';
    function __construct($db_ref){
        parent::__construct($db_ref);
    }
    function get_user($data=array()){
        $sql='select * from user_data where '.arr2and($data);
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        
    }
    function add_user($data=array()){
        $sql='insert into user_data set '.arr2set($data);
        $result=$this->db->query($sql);
        return $this->db->insert_id;
    }
    function get_user_type($data=array()){
        $sql='select * from user_type where '.arr2and($data);
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        
    }
}