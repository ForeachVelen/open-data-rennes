<?php

class Metro_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function getProchainMetro($arret, $sens){
        $json_bus = file_get_contents('https://data.rennesmetropole.fr/api/records/1.0/search/?dataset=prochains-passages-des-lignes-de-metro-du-reseau-star-en-temps-reel&rows=1&sort=-depart&facet=nomcourtligne&facet=sens&facet=destination&facet=nomarret&facet=precision&refine.nomarret='.$arret.'&refine.destination='.$sens.'&timezone=Europe%2FParis');

        return $json_bus;
    }

    public function getAllMetro(){
        return $this->db->get('metro')
            ->result_array();
    }

}