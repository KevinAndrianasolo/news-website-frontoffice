<?php
    require_once APPPATH.'models/BaseModel.php';
    require_once APPPATH.'classes/News_class.php';

    class NewsModel extends BaseModel{
        public function __construct(){
            parent::__construct();
        }
        public function getAllNews(){
            $sql = "select * from news_details";
            $res = $this->db->query($sql);
            $news = $res->result_array();

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
            return $this->toNewsArray($news);
        }
        public function toNewsArray($tmp){
            $news = [];
            for($i=0;$i<count($tmp);$i++){
                $tmp[$i]['keyword_news'] = $this->getKeywordsNewsOf($tmp[$i]['id_news']);
                $news[$i] = new News_class($tmp[$i]);
            }
            return $news;
        }
        public function getNews($id){
            $sql = "select * from news_details where id_news=%d";
            $sql = sprintf($sql, $id);
            $res = $this->db->query($sql);
            $news = $res->row_array();

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
            if($news == null) throw new Exception("News n°".$id." does not exists.");

            // Getting keywords:
            $news['keyword_news'] = $this->getKeywordsNewsOf($id);
            return new News_class($news);
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