<?php


class Services_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllservices($params = array()){
        $this->db->select('*');
        $this->db->from('services');

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

    public function addservice($service=null){
        $query = $this->db->insert('services', $service);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getServiceById($id){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }
    public function updateById($id,$service){

        $this->db->where('id',$id);
        $q = $this->db->update('services',$service);
        return $q;
    }

    public function deleteById($id){

        $this->db->where('id', $id);
        $q = $this->db->delete('services');
        return $q;
    }

}