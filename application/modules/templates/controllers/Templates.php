<?php

/**
 * Created by PhpStorm.
 * User: ThamerBelfki
 * Date: 15/01/2016
 * Time: 16:30
 */
class Templates extends  MX_Controller
{

    function __construct(){
        $this->load->model('notifications/Notifications_model');
        parent::__construct();
    }

    public function header(){
        $data ["notifications"] = $this->Notifications_model->getAllnotifications();
        $this->load->view('header',$data);
    }
    public function sidebar(){
        $this->load->view('sidebar');
    }
    public function footer() {
        $this->load->view('footer');
    }

    public function error(){
        $this->load->view('error');
    }

}