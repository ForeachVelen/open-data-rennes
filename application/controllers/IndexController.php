<?php

class IndexController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        ##### MODELS #####


        ##### LIBRARIES #####
        $this->load->library('form_validation');


        //$this->output->enable_profiler(TRUE);

    }

    public function index()
    {
        $this->slice->view('main');
    }



}