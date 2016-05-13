<?php


class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notifications/Notifications_model');
        $this->load->model('contrats/Contrats_model');
        $this->load->model('services/Services_model');
        $this->load->model('Status/Status_model');
        if(!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }

    }

    public function  index()
    {

//----------------------------------Algo Notification-------------------------------------------------
        $data['notifications'] = $this->Notifications_model->getAllnotifications();
        $data ['servicesnotpayed'] = $this->Services_model->serviceNotPayed();
        $data ['servicespayed'] = $this->Services_model->servicePayed();


        $data['serviceAsemail'] = $this->Services_model->serviceAsEmailing();
        $data['serviceAsserviceAsdomaine'] = $this->Services_model->serviceAsdomaine();
        $data['serviceAscertif'] = $this->Services_model->serviceAscertifssh();
        $data['status'] = $this->Status_model->getAllstatus();
        $data['services'] = $this->Services_model->getAllservices();
        $data['notif'] = $this->Notifications_model->getNotifIdService();

        //var_dump($data['services']);
        //die();

        $serviceid = array();

        foreach($data['notif'] as $notif =>$va){
            array_push($serviceid,$va->id_service);
        }






               foreach($data["services"] as $service){

                   $DATE1=$service->datefin;
                   $DATE2=date('Y-m-d');

                   $s = strtotime($DATE1)-strtotime($DATE2);
                   $d = intval($s/86400)+1;

                   if($data['notifications']) {

                           if ($d <= 30 && !in_array($service->id_service,$serviceid)) {
                               $notification = new stdClass();
                               $notification->titre = "Urgent";
                               $notification->description = "le service : " . $service->type_service . "s'est terminer aprés 30 jours<br> Contact client : <br> Nom & prénom : ".$service->lastname." ".$service->firstname." <br> Numéro Tel : ".$service->tel." <br> Email : ".$service->email;
                               $notification->id_service = $service->id_service;
                               $this->Notifications_model->addnotification($notification);

                       }
                   }else{
                       if ($d <= 30) {
                           $notification = new stdClass();
                           $notification->titre = "Urgent";
                           $notification->description = "le service : " . $service->type_service . "s'est terminer aprés 30 jours<br> Contact client : <br> Nom & prénom : ".$service->lastname." ".$service->firstname." <br> Numéro Tel : ".$service->tel." <br> Email : ".$service->email;
                           $notification->id_service  = $service->id_service;
                           $this->Notifications_model->addnotification($notification);
                       }
                   }
               }


       // var_dump($data['notif']);

// ----------------------------------------------------------------------------------------------------

        $this->load->view('index',$data);
    }


}