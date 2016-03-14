<?php

/**
 * Created by PhpStorm.
 * User: medianet
 * Date: 14/03/2016
 * Time: 16:30
 */
class Groupes_model extends  CI_Model
{


    public function __construct(){
        parent::__construct();
    }

    public function getAllgroupes($params = array()){
        $this->db->select('*');
        $this->db->from('groups');

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

}