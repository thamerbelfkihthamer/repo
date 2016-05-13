<?php


class Status_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllstatus($params = array()){
        $this->db->select('*');
        $this->db->from('status');

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

    public function getstatuswithserveurid($id){
        $this->db->select('*');
        $this->db->from('status');
        $this->db->where('serveur_id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function addstatu($statu=null){
        $query = $this->db->insert('status', $statu);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getstatuById($id){
        $this->db->select('*');
        $this->db->from('status');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }
    public function updateById($id,$statu){

        $this->db->where('id',$id);
        $q = $this->db->update('status',$statu);
        return $q;
    }

    public function deleteById($id){

        $this->db->where('id', $id);
        $q = $this->db->delete('status');
        return $q;
    }

}