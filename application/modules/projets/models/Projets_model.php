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

    public function getAllprojetswithclient(){
        $this->db->select('*');
        $this->db->from('projets');
        $this->db->join('clients', 'clients.id = projets.id_client');
        $query = $this->db->get();
        return $query->result();
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
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function updateById($id=null,$data){
        $this->db->where('id',$id);
        $q = $this->db->update('projets',$data);
        return $q;
    }

    public function updateByprojetsId($id =array(),$data){

        $this->db->where_in('id',$id);
        $q = $this->db->update('projets',$data);
        return $q;
    }

    public function getProjetsBycontrat($id){

        $this->db->select('*');
        $this->db->from('projets');
        $q = $this->db->get();
        return $q->result();
    }

    public function deleteById($id){
        $this->db->where('id', $id);
        $q = $this->db->delete('projets');
        return $q;
    }
}