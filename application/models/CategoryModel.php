<?php
    require_once APPPATH.'models/BaseModel.php';
    class CategoryModel extends BaseModel{
        public function __construct(){
            parent::__construct();
        }
        public function getAllCategory(){
            $sql = "select * from category";
            $res = $this->db->query($sql);
            $category = $res->result_array();

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
            return $category;
        }
        public function getCategory($id){
            $sql = "select * from category where id_category=%d";
            $sql = sprintf($sql, $id);
            $res = $this->db->query($sql);
            $category = $res->row_array();

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
            if($category == null) throw new Exception("Category n°".$id." does not exists.");
            return $category;
        }
        public function SaveCategory($data){
            $sql = "insert into category (name, description ) values ('%s','%s')";
            $sql = sprintf($sql, $data['name'], $data['description']);
            $this->db->query($sql);

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
        }
        public function UpdateCategory($id, $data){
            $sql = "update category set name='%s',description='%s' where id_category=%d";
            $sql = sprintf($sql, $data['name'], $data['description'] , $id);
            $this->db->query($sql);

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
        }
        public function DeleteCategory($id){
            $sql = "delete from category where id_category=%d";
            $sql = sprintf($sql, $id);
            $this->db->query($sql);

            //Checking the dberrors:
            $this->CheckDBErrors($this->db->error());
        }
    }
?>