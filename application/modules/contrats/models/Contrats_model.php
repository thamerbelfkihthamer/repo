<?php


class Contrats_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function getAllcontrats(){
    $this->db->select('*');
    $this->db->from('contrats');
    $q = $this->db->get();
    return $q->result();

}

    public function getContratByservice($params = array()){

        $this->db->select("s.id_contrat,s.prix_achat,s.prix_vente,c.code,c.date_creation, count(s.id_contrat) as 'nbservices',SUM(s.prix_achat) as 'prix_achat',SUM(s.prix_vente) as 'prix_vente'");
        $this->db->from('services s');
        $this->db->join('contrats c', 's.id_contrat=c.id', 'inner');
        $this->db->group_by("s.id_contrat");

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
        $this->db->from('services');
      //  $this->db->join('contrats',$id.'= services.id_contrat');
        $this->db->join('status','status.id = services.id_status');
        $this->db->join('serveurs','serveurs.serveur_id = services.id_serveur');
        $this->db->where('services.id_contrat',$id);
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