<?php


class acces_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllacces($params = array()){
        $this->db->select('*');
        $this->db->from('acces');

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

    public function getacceswithserveurid($id){
        $this->db->select('*');
        $this->db->from('acces');
        $this->db->where('serveur_id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function addacces($acces=null){
        $query = $this->db->insert('acces', $acces);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getaccesById($id){
        $this->db->select('*');
        $this->db->from('acces');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }
    public function updateById($id,$acces){

        $this->db->where('id',$id);
        $q = $this->db->update('acces',$acces);
        return $q;
    }

    public function deleteById($id){

        $this->db->where('id', $id);
        $q = $this->db->delete('acces');
        return $q;
    }

}