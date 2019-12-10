<?php

class Alerte_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllAlert(){
        $json_alert = file_get_contents('https://data.rennesmetropole.fr/api/records/1.0/search/?dataset=alertes-trafic-en-temps-reel-sur-les-lignes-du-reseau-star&rows=50&sort=-debutvalidite&facet=niveau&facet=debutvalidite&facet=finvalidite&facet=idligne&facet=nomcourtligne&timezone=Europe%2FParis');

        return $json_alert;
    }


}