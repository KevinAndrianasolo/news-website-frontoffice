<?php
    require_once APPPATH.'libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class Kevin extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function index(){
           $this->load->view('Kevin');
        }
    }

?>