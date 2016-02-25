<?php


class Projets_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllprojets($params = array()){
        $this->db->select('*');
        $this->db->from('projets');

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

    public function addprojet($projet=null){
        $query = $this->db->insert('projets', $projet);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getprojetById($id){
        $this->db->select('*');
        $this->db->from('projets');
        $this->db->where('Projetid',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function updateById($id=null,$data){
        $this->db->where('Projetid',$id);
        $q = $this->db->update('projets',$data);
        return $q;
    }

    public function deleteById($id){
        $this->db->where('Projetid', $id);
        $q = $this->db->delete('projets');
        return $q;
    }
}