<?php


class Moniteurs extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }
    }

    public function  index()
    {

        $this->load->view('index');
    }

}