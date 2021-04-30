<?php
    require_once APPPATH.'models/BaseModel.php';
    require_once APPPATH.'classes/News_class.php';

    class NewsModel extends BaseModel{
        public function __construct(){
            parent::__construct();
        }
        public function getAllNews(){
            
            $options = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>'Connection: close\r\n'
                )
            ); 
            $context = stream_context_create($options);

            $url = $this->BASE_URL."/api/News";
            $res = file_get_contents($url, false, $context);
            $news =  json_decode($res,true)['DATA'];
            return $news;
        }
        public function getNews($id){
            $options = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>'Connection: close\r\n'
                    )
                ); 
                $context = stream_context_create($options);
    
                $url = $this->BASE_URL."/api/News/".$id;
                
                $res = file_get_contents($url, false, $context);
                $news =  json_decode($res,true)['DATA'];
                return $news;
        }
        public function SaveNews($data){
            $sql = "insert into news (id_category,title,subtitle,description,content,image ) values (%d,'%s','%s','%s','%s','%s')";
            $sql = sprintf($sql, $data['id_category'], $data['title'], $data['subtitle'], $data['description'], $data['content'], $data['image']);
            $this->db->query($sql);

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
        }
        public function UpdateNews($id, $data){
            $sql = "update news set id_category=%d, title='%s',subtitle='%s',description='%s',content='%s',image='%s' where id_news=%d";
            $sql = sprintf($sql, $data['id_category'], $data['title'], $data['subtitle'], $data['description'], $data['content'], $data['image'], $id);
            $this->db->query($sql);

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
        }
        public function DeleteNews($id){
            $sql = "delete from news where id_news=%d";
            $sql = sprintf($sql, $id);
            $this->db->query($sql);

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
        }
        public function getKeywordsNewsOf($id){
            $sql = "select * from keyword_news where id_news=%d";
            $sql = sprintf($sql, $id);
            $res = $this->db->query($sql);
            $news = $res->result_array();

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
            return $news;
        }
    }
?>