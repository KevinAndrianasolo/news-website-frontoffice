<?php
    require APPPATH.'controllers/BaseController.php';
    class News extends BaseController{
        public function __construct(){
            parent::__construct();
            $this->load->model('NewsModel');
            $this->load->model('CategoryModel');

        }
        public function index(){
            try{
                $input = $this->input->get();
                $id_news = $input['id_news'];
                $category = $input['category'];
                $id_category = $input['id_category'];


                $category_list = $this->CategoryModel->getAllCategory();
                $news = $this->NewsModel->getNews($id_news);
                $related_news = $this->NewsModel->getAllRelatedNewsOf($id_news, $id_category);

                $data = array();

                $data['title'] = $news->instance['title'];
                $data['author'] = "ANDRIANASOLO LALA Sitrakaharinetsa Kevin, ETU000876";
                $data['keywords'] = implode(", ",$news->keywords);
                $data['description'] = $news->instance['description'];

                $data['news'] = $news;
                $data['related_news'] = $related_news;

                $data['category_list'] = $category_list;
                $data['category'] = $category;


                $this->load->view('Header', $data);
                $this->load->view('News', $data);
                $this->load->view('Footer', $data);

            }
            catch(Exception $e){
                throw $e;
            }
        }
        
    }
?>