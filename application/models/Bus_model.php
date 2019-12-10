<?php

class Bus_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getProchainBus($bus, $arret, $sens){
        $json_bus = file_get_contents('https://data.rennesmetropole.fr/api/records/1.0/search/?dataset=prochains-passages-des-lignes-de-bus-du-reseau-star-en-temps-reel&rows=1&sort=-depart&facet=nomcourtligne&facet=destination&facet=precision&refine.nomcourtligne='.$bus.'&refine.nomarret='.$arret.'&refine.destination='.$sens.'&timezone=Europe%2FParis');

        return $json_bus;
    }


}