<?php


class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getOneUser($where = array())
    {
        $this->db->select('*');
        $this->db->from('users');
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $this->db->join('roles', 'users.userid = roles.id');
        $query = $this->db->get();
        if ($row = $query->row()) {
            return $row;
        } else {
            return false;
        }
    }
}