<?php

helper("database/mysql_helper");

class dummy_model
{
    protected $db;
    protected $table;
    protected $primary_key;
    public function __construct($db_ref)
    {
        $this->db = $db_ref;
    }
    public function get($id=null)
    {
        
        $ret = [];
        $helper = new mysql_helper();
        $helper->select("*")->from($this->table);
        if(isset($id)){
            $helper->where([$this->primary_key => $id]);
        }
        $result = $helper->query_at($this->db);
        if($result->num_rows  == 1){
            return $result->fetch_assoc();
        }
        while($row = $result->fetch_assoc()){
            $ret[$row[$this->primary_key]] = $row;
        }
        return $ret;
    }
    public function update($id,$data)
    {
        $helper = new mysql_helper();
        $result = $helper->update($this->table,$data)->where([$this->primary_key => $id])->query_at($this->db);
        return $result;
    }
    public function delete($id)
    {
        $helper = new mysql_helper();
        $result = $helper->delete($table)->where([$this->primary_key => $id])->query_at($this->$db);
        return $result;
    }
    public function insert($data)
    {
        $helper = new mysql_helper();
        $result = $helper->insert($table,$data)->query_at($this->$db);
        return $result;
    }
}

?>
