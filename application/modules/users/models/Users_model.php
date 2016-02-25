<?php


class Users_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllusers($params = array()){
        $this->db->select('*');
        $this->db->from('users');
      //  $this->db->join('roles', 'users.roleid = roles.id');
        if (isset($params["limit"]) && $params["limit"] != "all") {
            $this->db->limit($params["limit"], $params["start"]);
        }

        if (!isset($params["count"])) {
            $query = $this->db->get();
            return $query->result();
        } else {
            return $this->db->count_all_results();
        }
    }

    public function adduser($user=null){
        $query = $this->db->insert('users', $user);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getUserById($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function CheckUser($where = array())
    {
        $this->db->select('*');
        $this->db->from('users');
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $query = $this->db->get();
        if ($row = $query->row()) {
            return $row;
        } else {
            return false;
        }
    }

    public function updateById($id=null,$data){
        $this->db->where('id',$id);
        $q = $this->db->update('users',$data);
        return $q;
    }

    public function deleteById($id){
        $this->db->where('id', $id);
        $q = $this->db->delete('users');
        return $q;
    }
}