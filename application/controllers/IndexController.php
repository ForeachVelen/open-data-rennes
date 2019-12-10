<?php

class IndexController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Europe/Paris');

        ##### MODELS #####
        $this->load->model("alerte_model");
        $this->load->model("bus_model");
        $this->load->model("metro_model");

        ##### LIBRARIES #####
        $this->load->library('form_validation');


        //$this->output->enable_profiler(TRUE);

    }

    public function index()
    {
        $bus = $this->bus_model->getAllBus();

        $metro = $this->metro_model->getAllMetro();

        $this->slice->view('main', array(
            'bus' => $bus,
            'metro' => $metro
        ));
    }

    public function prochainPassageBus(){
        $idBus = $this->input->post('bus');
        $idArret = $this->input->post('arret');
        $idSens = $this->input->post('sens');

        $bus = $this->bus_model->getBusById($idBus);

        $busNom = $bus['0']['nom'];

        $arret = $this->bus_model->getArretById($idArret);

        $arret = $arret['0']['nom'];

        $sens = $this->bus_model->getSensById($idSens);

        $sens = $sens['0']['nom'];

        $json = $this->bus_model->getProchainBus($busNom, $arret, $sens);

        $data = json_decode($json);

        echo json_encode($data->records);

    }

    public function sensBus(){
        $idBus = $this->input->post('id');

        $sens = $this->bus_model->getSensByBus($idBus);

        echo json_encode($sens);

    }

    public function arretBus(){
        $idBus = $this->input->post('id');

        $sens = $this->bus_model->getArretByBus($idBus);

        echo json_encode($sens);

    }

    public function showAlert(){
        $json_alert = $this->alerte_model->getAllAlert();

        $alerts = json_decode($json_alert);


        $this->slice->view('alert', array(
            'alerts' => $alerts->records
        ));
    }


    public function prochainMetro(){
        $arret = $this->input->post('arret');
        $sens = $this->input->post('sens');

        $json = $this->metro_model->getProchainMetro($arret, $sens);

        $data = json_decode($json);

        echo json_encode($data->records);

    }



}