<?php


class Fournisseurs_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllfournisseurs($params = array()){
        $this->db->select('*');
        $this->db->from('fournisseurs');

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
        $query = $this->db->insert('fournisseurs', $user);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

}