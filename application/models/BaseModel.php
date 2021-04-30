<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class BaseModel extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->BASE_URL = "https://news-website-webservice.herokuapp.com";
        }
        public function CheckDBErrors($dberror){
            if($dberror['code']!=0) throw new Exception($dberror['message']);
            return true;
        }
    }
?>