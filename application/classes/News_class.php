<?php
    class News_class{
        public function __construct($data){
            $this->instance = $data;
            $this->__init();
        }
        public function __init(){
            $this->link = $this->getLink();
            $this->keywords = $this->getKeywords();
            $this->__initHTMLInstance();
        }
        public function getLink(){
            $publication_date = $this->instance['publication_date'];
            $publication_date = str_replace("-","", $publication_date);
            $publication_date_tmp = explode(" ",$publication_date)[0];

            $title = $this->instance['title'];
            $link = $title;
            $link = str_replace(":","", $link);
            $link = str_replace("'","", $link);
            $link = str_replace("\"","", $link);
            $link = str_replace(".","", $link);
            $link = str_replace(";","", $link);
            $link = str_replace("=","", $link);
            $link = str_replace(",","", $link);
            $link = str_replace("/","", $link);
            $link = str_replace("\\", "", $link);
            $link = str_replace("!","", $link);
            $link = str_replace("?","", $link);
            $link = str_replace("…","", $link);
            $link = str_replace("à","a", $link);
            $link = str_replace("é","e", $link);
            $link = str_replace("è","e", $link);
            $link = str_replace("ù","u", $link);
            $link = str_replace("ç","c", $link);
            $link = str_replace("â","a", $link);
            $link = str_replace("î","i", $link);
            $link = str_replace("ê","e", $link);
            $link = str_replace("`","-", $link);
            $link = str_replace("’","-", $link);
            $link = str_replace("û","u", $link);

            $link = preg_replace("/\s+/","-", $link);
            $link = strtolower($link);
            $link = 'News/'.$this->instance['category_name'].'/'.$publication_date_tmp.'-'.$link.'-'.$this->instance['id_category'].'-'.$this->instance['id_news'];
            return $link;
        }
        public function getKeywords(){
            $keywords = [];
            for($i=0;$i<count($this->instance['keyword_news']);$i++){
                $keywords[$i] = $this->instance['keyword_news'][$i]['keyword'];
            }
            $keywords[] = "ETU000876";
            $keywords[] = "S6";
            $keywords[] = "TP Avril 2021";
            return $keywords;
        }
        public function __initHTMLInstance(){
            $this->HTMLInstance = [];
            $this->HTMLInstance['title'] = $this->instance['title'];
            $this->HTMLInstance['subtitle'] = $this->instance['subtitle'];
            $this->HTMLInstance['description'] = $this->instance['description'];
            $this->HTMLInstance['content'] = $this->instance['content'];
            $this->HTMLInstance['image'] = $this->instance['image'];
            $this->HTMLInstance['publication_date'] = $this->instance['publication_date'];
            for($i=0;$i<count($this->keywords);$i++){
                $this->HTMLInstance['title'] = str_ireplace($this->keywords[$i], "<strong>".$this->keywords[$i]."</strong>", $this->HTMLInstance['title']);
                $this->HTMLInstance['subtitle'] = str_ireplace($this->keywords[$i], "<strong>".$this->keywords[$i]."</strong>", $this->HTMLInstance['subtitle']);
                $this->HTMLInstance['description'] = str_ireplace($this->keywords[$i], "<strong>".$this->keywords[$i]."</strong>", $this->HTMLInstance['description']);
                $this->HTMLInstance['content'] = str_ireplace($this->keywords[$i], "<strong>".$this->keywords[$i]."</strong>", $this->HTMLInstance['content']);
            }
        }
    }
?>