<?php


class Clients extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('clients/Clients_model');
        $this->load->helper('pagination');
        $this->load->library('ion_auth');
        $this->load->library('session');
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

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $client = new stdClass();
        $client->lastname = $request->nom;
        $client->firstname = $request->prenom;
        $client->email = $request->email;
        $client->tel = $request->tel;
        $id = $this->Clients_model->addclient($client);
        if ($id != null) {
            $this->session->set_flashdata('succus', 'Nouvel client est bien enregistrer.');
            redirect('clients');
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('clients/create');
        }
    }

    /*
     * return edit client form
     */
    public function edit()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $id = $request->id;
        $client = $this->Clients_model->getclientById($id);
        echo json_encode($client);
    }

    /*
     * update client data in database table
     */
    public function update()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $client = new stdClass();
        $client->lastname = $request->nom;
        $client->firstname = $request->prenom;
        $client->email = $request->email;
        $client->tel = $request->tel;
        $id = $request->id;

        $res = $this->Clients_model->updateById($id, $client);
        if ($res) {
            echo json_encode($res);
        }


    }

    /*
     * delete client from database
     */
    public function delete()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $res = $this->Clients_model->deleteById($request->id);

        if ($res) {
           echo $res;
        } else {
            echo $res;
        }

    }

}