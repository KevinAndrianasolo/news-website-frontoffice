<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class BaseModel extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        public function CheckDBErrors($dberror){
            if($dberror['code']!=0) throw new Exception($dberror['message']);
            return true;
        }
    }
?>