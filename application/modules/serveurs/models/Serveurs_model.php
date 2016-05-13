<?php


class Serveurs_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllserveurs($params = array()){
        $this->db->select('*');
        $this->db->from('serveurs');
        $this->db->join('fournisseurs','fournisseurs.id = serveurs.id_fournisseur');

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

    public function getserveurs(){
        $this->db->select('*');
        $this->db->from('serveurs');
        $query = $this->db->get();
        return $query->result();

    }

    public function getServeurById($id){
        $this->db->select('*');
        $this->db->from('serveurs');
        $this->db->where('serveur_id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function updateByServeursId($serveurs =array(),$id_projet){
        $this->db->where_in('serveur_id',$serveurs);
        $q = $this->db->update('serveurs',$id_projet);
        return $q;
    }
    public function updateById($id=null,$data){
        $this->db->where('serveur_id',$id);
        $q = $this->db->update('serveurs',$data);
        return $q;
    }

    public function deleteById($id){
        $this->db->where('serveur_id', $id);
        $q = $this->db->delete('serveurs');
        return $q;
    }
}