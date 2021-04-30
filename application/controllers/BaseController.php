<?php
    require_once APPPATH.'libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class BaseController extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }
        public function BuildResponse($status,$type,$message,$data){
            return [
                "META"=>[
                    "type"=>$type,
                    "status"=>$status,
                    "message"=>$message
                ],
                "DATA"=>$data
            ];
        }
    }
?>