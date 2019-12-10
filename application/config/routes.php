<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//##### Alertes réseau star #####
$route['alerte'] = 'IndexController/showAlert';


//##### Bus réseau star #####
$route['bus'] = 'IndexController/prochainPassageBus';

$route['sens'] = 'IndexController/sensBus';

$route['arret'] = 'IndexController/arretBus';


//##### DEFAULT CONTROLLER #####
$route['default_controller'] = 'IndexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
