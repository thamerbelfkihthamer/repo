<?php


class Clients_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllclients($params = array()){
        $this->db->select('*');
        $this->db->from('clients');
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

    public function addclient($client=null){
        $query = $this->db->insert('clients', $client);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getclientById($id){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function updateById($id=null,$data){
        $this->db->where('id',$id);
        $q = $this->db->update('clients',$data);
        return $q;
    }

    public function deleteById($id){
        $this->db->where('id', $id);
        $q = $this->db->delete('clients');
        return $q;
    }
}