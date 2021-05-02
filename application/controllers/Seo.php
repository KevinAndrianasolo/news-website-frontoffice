<?php
    Class Seo extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('NewsModel');

        }
        function sitemap()
        {
            $urls = [
                "News/All"
            ];
            
            $news = $this->NewsModel->getAllNews();
            for($i=0;$i<count($news);$i++){
                $urls[] = $news[$i]->link;
            }
            $data = array();//select urls from DB to Array
            $data['data'] = $urls;
            header("Content-Type: text/xml;charset=iso-8859-1");
            $this->load->view("sitemap",$data);
        }
    }
?>