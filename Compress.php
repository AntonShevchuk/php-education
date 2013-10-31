<?php

class Compress{
    private $haffman;
    private $chars=array();
    
    public function __construct(Haffman $h,  CharacterSet $c) {
       if(!empty($h->codeChars)||!empty($c->data)){
           $this->haffman=$h;
           $this->chars=$c->createNodes();
       }else{
            throw new Exception('Невозможно создать обьект типа'.__CLASS__);
       }
       
    }
  
  public function initialText(){
      $res=0;
      foreach ($this->haffman->queue->queue as $node) {
         $res+=$node->value*8;
      }     
      return $res;
    }

    public function compressedText() {
        $res=0;
        $len=0;
        $mass = array_unique($this->haffman->codeChars); 
        $mass=array_values($mass);
        for($i=0;$i<count($mass);$i++) {
            $len=strlen($mass[$i]);
            $res+=$this->chars[$i]->value * $len;
        }
        return $res;
    }
}
?>
