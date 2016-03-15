<?php


class Contrats_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllcontrats($params = array()){
        $this->db->select('*');
        $this->db->from('contrats');

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

    public function addcontrat($contrat=null){
        $query = $this->db->insert('contrats', $contrat);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getContratById($id){
        $this->db->select('*');
        $this->db->from('contrats');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }
    public function updateById($id,$contrat){

        $this->db->where('id',$id);
        $q = $this->db->update('contrats',$contrat);
        return $q;
    }

    public function deleteById($id){

        $this->db->where('id', $id);
        $q = $this->db->delete('contrats');
        return $q;
    }

}