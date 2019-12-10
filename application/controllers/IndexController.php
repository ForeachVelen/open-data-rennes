<?php

class IndexController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Europe/Paris');

        ##### MODELS #####
        $this->load->model("alerte_model");
        $this->load->model("bus_model");

        ##### LIBRARIES #####
        $this->load->library('form_validation');


        //$this->output->enable_profiler(TRUE);

    }

    public function index()
    {
        //sens : Lycée Bréquigny ou Patton
        //Arret : Volney
        $bus = 'C5';
        $arret = 'Volney';
        $sens = 'Lycée Bréquigny';

        $json = $this->bus_model->getProchainBus($bus, $arret, $sens);
        $prochain_passage = json_decode($json);

        $this->slice->view('main', array(
            'prochain_passage' => $prochain_passage->records[0]->fields
        ));

    }

    public function showAlert(){
        $json_alert = $this->alerte_model->getAllAlert();

        $alerts = json_decode($json_alert);


        $this->slice->view('alert', array(
            'alerts' => $alerts->records
        ));
    }



}