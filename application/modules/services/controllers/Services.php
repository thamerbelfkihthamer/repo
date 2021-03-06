<?php


class Services extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('services/Services_model');
        $this->load->model('serveurs/Serveurs_model');
        $this->load->model('Status/Status_model');
        $this->load->model('clients/Clients_model');
        $this->load->model('contrats/Contrats_model');
        $this->load->helper('pagination');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        if($this->session->userdata('role') == "Administrateur Systéme")
        {
            redirect('templates/error');

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


    /**
     * @param null $id
     */
    public function create($id=null)
    {
        $data['serveur_id'] = $id;
        $data['serveurs'] = $this->Serveurs_model->getserveurs();
        $data['status'] = $this->Status_model->getAllstatus();
        $data['clients'] = $this->Clients_model->getAllclients();
        $data['contrats'] = $this->Contrats_model->getAllcontrats();

            $this->load->view('create', $data);
    }

    /*
    * add user data in database user table
    */
    public function store()
    {
        $this->form_validation->set_rules('typeservice', 'Type acces', 'required');
        $this->form_validation->set_rules('datedebut', 'Identifiant', 'required');
        $this->form_validation->set_rules('datefin', 'mot de passe', 'required');
        $this->form_validation->set_rules('prixachat', 'mot de passe', 'required');
        $this->form_validation->set_rules('prixvente', 'mot de passe', 'required');
        $this->form_validation->set_rules('status', 'mot de passe', 'required');
        $this->form_validation->set_rules('serveur', 'mot de passe', 'required');
        $this->form_validation->set_rules('client', 'mot de passe', 'required');
        $this->form_validation->set_rules('contrat','contrat','required');

        $serveurid = $this->input->post('serveur_id');
        if ($this->form_validation->run()) {
            $service = new stdClass();
            $service->type_service = $this->input->post('typeservice');
            $service->datedebut = $this->input->post('datedebut');
            $service->datefin = $this->input->post('datefin');
            $service->prix_achat = $this->input->post('prixachat');
            $service->prix_vente = $this->input->post('prixvente');
            $service->id_status = $this->input->post('status');
            $service->id_serveur = $this->input->post('serveur');
            $service->id_client = $this->input->post('client');
            $service->id_contrat = $this->input->post('contrat');
            $id = $this->Services_model->addservice($service);
            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel Service est bien enregistrer.');
                redirect('services');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('services/create/' . $serveurid);
        }
    }

    /*
     * return edit user form
     */
    public function edit($id = null)
    {
        $data['serveurs'] = $this->Serveurs_model->getserveurs();
        $data['service'] = $this->Services_model->getServiceById($id);
        $data['status'] = $this->Status_model->getAllstatus();
        $data['clients'] = $this->Clients_model->getAllclients();
        $data['contrats'] = $this->Contrats_model->getAllcontrats();

    
        $this->load->view('edit', $data);
    }

    /*
     * update user data in database table
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('typeservice', 'Type acces', 'required');
        $this->form_validation->set_rules('datedebut', 'Identifiant', 'required');
        $this->form_validation->set_rules('datefin', 'mot de passe', 'required');
        $this->form_validation->set_rules('prixachat', 'mot de passe', 'required');
        $this->form_validation->set_rules('prixvente', 'mot de passe', 'required');
        $this->form_validation->set_rules('status', 'mot de passe', 'required');
        $this->form_validation->set_rules('serveur', 'mot de passe', 'required');
        $this->form_validation->set_rules('client','client','required');
        $this->form_validation->set_rules('contrat','contrat','required');

        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                $service = new stdClass();
                $service->type_service = $this->input->post('typeservice');
                $service->datedebut = $this->input->post('datedebut');
                $service->datefin = $this->input->post('datefin');
                $service->prix_achat = $this->input->post('prixachat');
                $service->prix_vente = $this->input->post('prixvente');
                $service->id_status = $this->input->post('status');
                $service->id_serveur = $this->input->post('serveur');
                $service->id_client = $this->input->post('client');
                $service->id_contrat = $this->input->post('contrat');
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

    public function show($id=null)
    {
        $start = 10;
        $data['startt'] = $start;
        if ($this->input->get('startt')) {
            $data['startt'] = $this->input->get('startt');
        }
        $data['serveurid'] = $id;
        $services = $this->Services_model->getServiceswithserveurid($id);
        $data['services'] = $services;
        $this->load->view('show', $data);
    }

    /*
     * delete user from database
     */
    public function delete($id = null)
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $res = $this->Services_model->deleteById($request->id);

        if ($res) {
            echo $res;
        } else {
            echo $res;
        }
    }

}