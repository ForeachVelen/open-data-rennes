<?php

class Bus_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    public function getProchainBus($bus, $arret, $sens){
        $json_bus = file_get_contents('https://data.rennesmetropole.fr/api/records/1.0/search/?dataset=prochains-passages-des-lignes-de-bus-du-reseau-star-en-temps-reel&rows=1&sort=-depart&facet=nomcourtligne&facet=destination&facet=precision&refine.nomcourtligne='.$bus.'&refine.nomarret='.$arret.'&refine.destination='.$sens.'&timezone=Europe%2FParis');

        return $json_bus;
    }

    public function getArretByBus($idBus){
        return $this->db->where('id_bus', $idBus)->get('arret')
            ->result();
    }

    public function getSensByBus($idBus){
        return $this->db->where('id_bus', $idBus)->get('sens')
            ->result();
    }

    public function getBusById($idBus){
        return $this->db->where('id', $idBus)->get('bus')
            ->result_array();
    }


    public function getAllBus(){
        return $this->db->get('bus')
            ->result_array();
    }


    public function getArretById($id){
        return $this->db->where('id', $id)->get('arret')
            ->result_array();
    }

    public function getSensById($id){
        return $this->db->where('id', $id)->get('sens')
            ->result_array();
    }

}