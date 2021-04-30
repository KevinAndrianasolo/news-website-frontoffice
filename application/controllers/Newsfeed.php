<?php
    require APPPATH.'controllers/BaseController.php';
    class Newsfeed extends BaseController{
        public function __construct(){
            parent::__construct();
            $this->load->model('NewsModel');
        }
        public function index(){
            try{
                $news = $this->NewsModel->getAllNews();
               
                $data = array();
                $data['news'] = $news;
                $this->load->view('Newsfeed', $data);
            }
            catch(Exception $e){
                throw $e;
            }
        }
        
    }
?>