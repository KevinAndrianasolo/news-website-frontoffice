<?php
    require APPPATH.'controllers/BaseController.php';
    class Newsfeed extends BaseController{
        public function __construct(){
            parent::__construct();
            $this->load->model('NewsModel');
            $this->load->model('CategoryModel');

        }
        public function index(){
            try{
                $input = $this->input->get();
                $category = isset($input['category']) ? $input['category'] : "All";
                $id_category = isset($input['id_category']) ? $input['id_category'] : -1;


                $news = $this->NewsModel->getAllNewsOf($id_category);
                $category_list = $this->CategoryModel->getAllCategory();

                $data = array();

                $data['title'] = "Actualités - ETU000876 - TP Avril 2021 - S6";
                $data['keywords'] = "ETU000876, TP Avril 2021, S6";
                $data['author'] = "ANDRIANASOLO LALA Sitrakaharinetsa Kevin, ETU000876";
                $data['description'] = "Fil d'actualité du site NewsWebsite - ETU000876, TP Avril 2021, S6";

                $data['news'] = $news;
                $data['category'] = $category;
                $data['category_list'] = $category_list;
                $this->load->view('Header', $data);
                $this->load->view('Newsfeed', $data);
                $this->load->view('Footer', $data);
            }
            catch(Exception $e){
                throw $e;
            }
        }
        
    }
?>