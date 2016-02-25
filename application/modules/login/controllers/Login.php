<?php


class Login extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login/login_model');
      //  $this->load->library("Aauth");

    }

    public function  index()
    {
        $this->load->view('login');
    }

    public function connexion()
    {

        $this->form_validation->set_rules('email', 'Login', 'required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');

        if (!$this->form_validation->run())
        {
            redirect('login');
        } else
        {

            $where = array();
            $where["email"] = $this->security->xss_clean($this->input->post('email'));
            $where['password'] = sha1($this->input->post('password'));
            $res = $this->login_model->getOneUser($where);
            if($res){
                $this->session->set_userdata(array(
                    'username'=>$res->firstname,
                    'lastname'=>$res->lastname,
                    'role' =>$res->name,
                    'id'=>$res->userid
                ));

                redirect('dashboard');
            }
            else{
                $this->session->set_flashdata('erreur', 'Paramètres de connexion invalides !!');
                redirect("login");
            }
        }
    }


    public function  deconnexion()
    {
        $this->session->sess_destroy();
        redirect("login");
    }

}