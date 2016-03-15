<?php


class Services extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('services/Services_model');
        $this->load->helper('pagination');
        if (!$this->ion_auth->logged_in())
        {
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
        $base_url = site_url() . '/services';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Services_model->getAllservices($params);
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
        $data ["services"] = $this->Services_model->getAllservices($params);

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
        $this->form_validation->set_rules('name', 'name', 'required');
        /*
         *
         */
        if ($this->form_validation->run()) {
            $service = new stdClass();
            $service->name = $this->input->post('name');
            $id = $this->Services_model->addservice($service);
            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel utilisateur est bien enregistrer.');
                redirect('services');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('services/create');
        }
    }

    /*
     * return edit user form
     */
    public function edit($id = null)
    {
        $data['service'] = $this->Services_model->getServiceById($id);
        $this->load->view('edit', $data);
    }

    /*
     * update user data in database table
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                $service = new stdClass();
                $service->name = $this->input->post('name');
                $res = $this->Services_model->updateById($id, $service);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('services');
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('services');
                }
            } else {
                $this->session->set_flashdata('error', 'valider votre données');
                $this->edit($id);
            }
        }
    }

    /*
     * delete user from database
     */
    public function delete($id = null)
    {
        $res = $this->Services_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('services');
        } else {
            $this->session->set_flashdata('error', 'supprission ne marche pas ');
            redirect('services');
        }

    }

}