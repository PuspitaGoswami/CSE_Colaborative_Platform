<?php
    class Format{
       public function formatDate($date){
          return date('F j, Y, g:i a', strtotime($date));
       }

       public function textShorten($text, $limit = 130){
        $text = $text." ";
        $text = substr($text, 0, $limit);
        $text = $text.".....";
        return $text;
      }
        public function textShorten2($text, $limit = 28){
        $text = $text." ";
        $text2 = substr($text, 0, $limit);
        $text2 = $text2;
        if (strlen($text)>35) {
          # code...
          return $text2."....";

        }else{
        return $text2;}
      }

      public function validation($data){
         $data = trim ($data);
         $data = stripcslashes($data);
         $data = htmlspecialchars($data);
         return $data;
      }
    }
?>