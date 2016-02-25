<?php


class Clients extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('clients/Clients_model');
        $this->load->helper('pagination');
        /*
        if (!$this->session->clientdata('clientname')) {
            // Allow some methods?
            $allowed = array(
                'some_method_in_this_controller',
                'other_method_in_this_controller',
            );
            if (!in_array($this->router->fetch_method(), $allowed)) {
                redirect('login');
            }
        }
        */

    }

    /*
     * return all clients
     * @api
     * @return void
     */
    public function  index()
    {
        $start = 10;

        if ($this->input->get('startt')) {
            $start = $this->input->get('startt');
        }
        $base_url = site_url() . '/clients';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Clients_model->getAllclients($params);
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
        $data ["clients"] = $this->Clients_model->getAllclients($params);

        $data['startt'] = $start;
        $this->load->view('index', $data);
    }


    /*
     * return create  client form
     */
    public function create()
    {
        $this->load->view('create');
    }

    /*
    * add client data in database client table
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
            $client = new stdClass();
            $client->lastname = $this->input->post('nom');
            $client->firstname = $this->input->post('prenom');
            $client->email = $this->input->post('email');
            $client->password = sha1($this->input->post('motdepasss'));
            $client->roleid = $this->input->post('role');
            $id = $this->Clients_model->addclient($client);
            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel client est bien enregistrer.');
                redirect('clients');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('clients/create');
        }
    }

    /*
     * return edit client form
     */
    public function edit($id = null)
    {
        $data['client'] = $this->Clients_model->getclientById($id);
        $this->load->view('edit', $data);
    }

    /*
     * update client data in database table
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->input->post()) {

            if ($this->form_validation->run()) {

                $client = new stdClass();
                $client->lastname = $this->input->post('nom');
                $client->firstname = $this->input->post('prenom');
                $client->email = $this->input->post('email');
                if ($this->input->post('motdepasss') != null) {
                    $client->password = sha1($this->input->post('motdepasss'));
                }
                $client->roleid = $this->input->post('role');

                $res = $this->Clients_model->updateById($id, $client);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('clients');
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('clients');
                }

            } else {
                $this->session->set_flashdata('error', 'valider votre donnéesss');
                $this->edit($id);
            }
        }

    }

    /*
     * delete client from database
     */
    public function delete($id = null)
    {
        $res = $this->Clients_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('clients');
        } else {
            $this->session->set_flashdata('error', 'supprission ne marche pas ');
            redirect('clients');
        }

    }

}