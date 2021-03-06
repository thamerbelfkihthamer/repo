<?php


class Services_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllservices($params = array()){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->join('status', 'status.id = services.id_status');
        $this->db->join('serveurs', 'serveurs.serveur_id = services.id_serveur');
        $this->db->join('clients', 'clients.client_id = services.id_client');


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

    public function getServiceswithserveurid($id){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('serveur_id',$id);
        $q = $this->db->get();
        return $q->result();
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
        $this->db->where('id_service',$id);
        $q = $this->db->get();
        return $q->result();
    }
    public function updateById($id,$service){

        $this->db->where('id_service',$id);
        $q = $this->db->update('services',$service);
        return $q;
    }

    public function serviceNotPayed(){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->join('status', 'status.id = services.id_status');
        $this->db->where('services.id_status',2);
        $q = $this->db->get();
        return $q->result();
    }

    public function servicePayed(){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->join('status', 'status.id = services.id_status');
        $this->db->where('services.id_status',1);
        $q = $this->db->get();
        return $q->result();
    }

    public function serviceAsEmailing(){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('type_service','Service Emailing');

        $q = $this->db->get();
        return $q->result();
    }

    public function serviceAsdomaine(){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('type_service','Nom domaine');

        $q = $this->db->get();
        return $q->result();
    }
    public function serviceAscertifssh(){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('type_service','Certification SSR');

        $q = $this->db->get();
        return $q->result();
    }
    public function deleteById($id){

        $this->db->where('id_service', $id);
        $q = $this->db->delete('services');
        return $q;
    }

}