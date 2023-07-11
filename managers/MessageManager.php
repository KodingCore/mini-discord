<?php

 require 'AbstractManager.php';
 
 class MessageManager extends AbstractManager{
     
     
     function addMessage(Message $message) :void 
     {
         $query =$this->db->prepare('INSERT INTO messages(content) VALUES(:content)');
         $parameters=[
             'content' => $content,
             
        ];
         $query->excute($parameters);
     }
     
     function 
     
 }



?>