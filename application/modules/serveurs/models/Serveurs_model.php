<?php


class Serveurs_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllserveurs($params = array()){
        $this->db->select('*');
        $this->db->from('serveurs');

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

    public function addserveur($serveur=null){
        $query = $this->db->insert('serveurs', $serveur);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getServeurById($id){
        $this->db->select('*');
        $this->db->from('serveurs');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function updateById($id=null,$data){
        $this->db->where('id',$id);
        $q = $this->db->update('serveurs',$data);
        return $q;
    }

    public function deleteById($id){
        $this->db->where('id', $id);
        $q = $this->db->delete('serveurs');
        return $q;
    }
}