<?php


class Status extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Status/Status_model');
        $this->load->model('serveurs/Serveurs_model');
        $this->load->helper('pagination');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    /*
     * return all serveurs
     * @api
     * @return void
     */
    public function  index()
    {
        $start = 10;

        if ($this->input->get('startt')) {
            $start = $this->input->get('startt');
        }
        $base_url = site_url() . '/Status';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Status_model->getAllStatus($params);
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
        $data ["Status"] = $this->Status_model->getAllStatus($params);

        $data['startt'] = $start;
        $this->load->view('index', $data);
    }


    /**
     * @param null $id
     */
    public function create($id=null)
    {
        $data['serveur_id'] = $id;
        $data['serveurs'] = $this->Serveurs_model->getAllserveurs();
        $this->load->view('create', $data);
    }

    /*
    * add user data in database user table
    */
    public function store()
    {
        $this->form_validation->set_rules('typeacces', 'Type acces', 'required');
        $this->form_validation->set_rules('Identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('motdepass', 'mot de passe', 'required');

        $serveurid = $this->input->post('serveur_id');
        if ($this->form_validation->run()) {
            $service = new stdClass();
            $service->name = $this->input->post('typeacces');
            $service->identifiant = $this->input->post('Identifiant');
            $service->password = $this->input->post('motdepass');
            $service->serveur_id = $this->input->post('serveur_id');
            $id = $this->Status_model->addservice($service);
            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel Service est bien enregistrer.');
                redirect('Status/show/' . $serveurid);
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('Status/create/' . $serveurid);
        }
    }

    /*
     * return edit user form
     */
    public function edit($id = null)
    {
        $data['serveurs'] = $this->Serveurs_model->getAllserveurs();
        $data['Status'] = $this->Status_model->getServiceById($id);
        $this->load->view('edit', $data);
    }

    /*
     * update user data in database table
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('typeacces', 'Type acces', 'required');
        $this->form_validation->set_rules('Identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('motdepass', 'mot de passe', 'required');

        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                $service = new stdClass();
                $service->name = $this->input->post('typeacces');
                $service->identifiant = $this->input->post('Identifiant');
                $service->password = $this->input->post('motdepass');
                $serveurid = $this->input->post('serveur_id');
                $res = $this->Status_model->updateById($id, $service);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('Status/show/' . $serveurid);
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('Status/show/' . $serveurid);
                }
            } else {
                $this->session->set_flashdata('error', 'valider votre données');
                $this->edit($id);
            }
        }
    }

    public function show($id=null)
    {
        $start = 10;
        $data['startt'] = $start;
        if ($this->input->get('startt')) {
            $data['startt'] = $this->input->get('startt');
        }
        $data['serveurid'] = $id;
        $Status = $this->Status_model->getStatuswithserveurid($id);
        $data['Status'] = $Status;
        $this->load->view('show', $data);
    }

    /*
     * delete user from database
     */
    public function delete($id = null)
    {
        $res = $this->Status_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('Status');
        } else {
            $this->session->set_flashdata('error', 'suppression ne marche pas ');
            redirect('Status');
        }

    }

}