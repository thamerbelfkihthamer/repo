<?php


class Users extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users/Users_model');
        $this->load->helper('pagination');

        /*
        if(!$this->ion_auth->logged_in()){
            redirect('auth', 'refresh');
        }
        */
    }

    /*
     * return all users
     * @api
     * @return void
     */
    public function  index()
    {
        $start = 10;

        if ($this->input->get('startt')) {
            $start = $this->input->get('startt');
        }
        $base_url = site_url() . '/users';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Users_model->getAllusers($params);
        $parametres = array(
            'total' => $data['count'],
            'base_url' => $base_url,
            'start' => $start
        );
        // Load Helper Pagination
        // Retour pagination pour le view
        $data ['links'] = pagination($parametres);

        $params = array();
        $params ["limit"] = $start;
        $data ["limit"] = $params ["limit"];
        $params ["start"] = (isset($_GET ["start"])) ? $_GET ["start"] : "0";
        $data ["start"] = $params ["start"] + 1;
        $params ["ordre"] = "id_reponse";

        // Liste des enregistements du requette
        $data ["users"] = $this->Users_model->getAllusers($params);

        $data['startt'] = $start;
        $this->load->view('index', $data);
    }


    /*
     * return create  user form
     */
    public function create()
    {
        $this->load->view('create');
    }

    /*
    * add user data in database user table
    */
    public function store()
    {
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('motdepasss', 'mot de passe ', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        /*
         *
         */
        if ($this->form_validation->run()) {
            $user = new stdClass();
            $user->lastname = $this->input->post('nom');
            $user->firstname = $this->input->post('prenom');
            $user->email = $this->input->post('email');
            $user->password = sha1($this->input->post('motdepasss'));
            $user->roleid = $this->input->post('role');
            $id = $this->Users_model->adduser($user);
            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel utilisateur est bien enregistrer.');
                redirect('users');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('users/create');
        }
    }

    /*
     * return edit user form
     */
    public function edit($id = null)
    {
        $data['user'] = $this->Users_model->getUserById($id);
        $this->load->view('edit', $data);
    }

    /*
     * update user data in database table
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->input->post()) {

            if ($this->form_validation->run()) {

                $user = new stdClass();
                $user->lastname = $this->input->post('nom');
                $user->firstname = $this->input->post('prenom');
                $user->email = $this->input->post('email');
                if ($this->input->post('motdepasss') != null) {
                    $user->password = sha1($this->input->post('motdepasss'));
                }
                $user->roleid = $this->input->post('role');

                $res = $this->Users_model->updateById($id, $user);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('users');
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('users');
                }

            } else {
                $this->session->set_flashdata('error', 'valider votre donnéesss');
                $this->edit($id);
            }
        }

    }

    /*
     * delete user from database
     */
    public function delete($id = null)
    {
        $res = $this->Users_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('users');
        } else {
            $this->session->set_flashdata('error', 'supprission ne marche pas ');
            redirect('users');
        }

    }

}