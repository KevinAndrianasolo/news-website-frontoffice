<?php
    require_once APPPATH.'models/BaseModel.php';
    class ProfilModel extends BaseModel{
        public function __construct(){
            parent::__construct();
            $this->load->model("TokenManager");
        }
        public function Login($username,$password){
            $sql = "SELECT id_profil,username,password from profil where username=%s and password=md5(%s)";
            $sql = sprintf($sql,$this->db->escape($username),$this->db->escape($password));
            $query = $this->db->query($sql);
            $profil = $query->row_array();

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
            if($profil==null) throw new Exception("Le nom d'utilisateur ou le mot de passe est incorrect.");

            // Create a token and insert it with an expiration date:
            $token = $this->TokenManager->InsertTokenFor($profil['id_profil']);
            return $token;
        }
    }
?>