<?php
    require APPPATH.'controllers/BaseController.php';
    class News extends BaseController{
        public function __construct(){
            parent::__construct();
            $this->load->model('NewsModel');
        }
        public function index(){
            try{
                $input = $this->input->get();
                $id_news = $input['id_news'];
                $news = $this->NewsModel->getNews($id_news);
                $data = array();
                $data['news'] = $news;
                $this->load->view('News', $data);
            }
            catch(Exception $e){
                throw $e;
            }
        }
        
    }
?>