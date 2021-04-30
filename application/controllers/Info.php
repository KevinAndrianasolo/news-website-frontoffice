<?php
    require_once APPPATH.'libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class Info extends REST_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function index_get(){
            $infos = [];
            $infos['ETU'] = "ETU000876";
            $infos['NOM'] = "ANDRIANASOLO LALA Sitrakaharinesta Kevin";

            $this->response($infos,REST_Controller::HTTP_OK);
        }
    }

?>