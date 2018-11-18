<?php


class FormatText{

    public $_text;

    public function set($text){
        $this->_text = $text;
        return $this;  
    }

    public function print(){
        return "<li>" .$this->_text ."</li>" ;
     }

     public function bold(){
        $this->_text = "<strong>" .$this->_text ."</strong>" ;
        return $this;
     }

     public function italic(){
        $this->_text = "<em>" .$this->_text ."</em>" ;
        return $this;
     }

     public function strike(){
        $this->_text = "<strike>" .$this->_text ."</strike>" ;
        return $this;
     }







}


