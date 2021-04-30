<?php
    require_once APPPATH.'models/BaseModel.php';
    class TokenManager extends BaseModel{
        public function __construct(){
            parent::__construct();
        }
        public function InsertTokenFor($id_profil){
            $sql = "INSERT INTO profil_token(id_profil,token,expiration_date) VALUES (%d,md5(CONCAT(%s,'_',CURRENT_TIMESTAMP)),CURRENT_TIMESTAMP + interval '30 days') returning token";
            $sql = sprintf($sql,$id_profil,$this->db->escape($id_profil));
            $res = $this->db->query($sql)->row_array();

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
            return $res['token'];
        }

        function IsAValidToken($token){
            $sql = "SELECT * FROM profil_token where token=%s and expiration_date>current_timestamp";
            $sql = sprintf($sql,$this->db->escape($token));
            $query = $this->db->query($sql);
            $data = $query->row_array();
            $this->CheckDBErrors($this->db->error());
            if($data==null)     throw new Exception("Accès refusé.");
            
            return $data['id_profil'];
        }
        function getTokenWithBearerToken($bearer_token){
            return preg_replace("/Bearer\s/","",$bearer_token);
        }
    }

?>