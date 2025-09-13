<?php

helper("model/dummy_model");
class forum extends dummy_model{
    protected $table = 'forum_topic';
    protected $primary_key = 'id';
    function __construct($db_ref){
        parent::__construct($db_ref);
    }
    function get($data=array()){
        $sql='select * from '.$this->table.' where '.arr2and($data);
        //print $sql;
        $result=$this->db->query($sql);

        
        $sql='select id,name,surname,picture from user_data';
        $user_data=$this->db->query($sql);
        $users=array();
        while($u=$user_data->fetch_assoc()){
            $users[$u['id']]=$u;
        }

            $res=array();
            while($row=$result->fetch_assoc()){
                $row['owner_data']=$users[$row['owner']];
                $res[]=$row;
            }
            return $res;
        
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