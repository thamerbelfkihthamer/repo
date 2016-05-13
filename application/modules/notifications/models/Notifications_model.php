<?php


class Notifications_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }


    public function getAllnotifications($params = array()){
        $this->db->select('*');
        $this->db->from('notifications');
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

    public function addnotification($notification=null){
        $query = $this->db->insert('notifications', $notification);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getnotificationById($id){
        $this->db->select('*');
        $this->db->from('notifications');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function updateById($id=null,$data){
        $this->db->where('id',$id);
        $q = $this->db->update('notifications',$data);
        return $q;
    }

    public function deleteById($id){
        $this->db->where('id', $id);
        $q = $this->db->delete('notifications');
        return $q;
    }

    public function getNotifIdService(){
        $this->db->select('id_service');
        $this->db->from('notifications');
        $q = $this->db->get();
        return $q->result();

    }

    public function getById($id){
        $this->db->select('*');
        $this->db->from('notifications');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }
}