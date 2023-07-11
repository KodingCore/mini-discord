<?php

 require 'AbstractManager.php';
 
 class MessageManager extends AbstractManager{
     
     
     function addMessage(Message $message) : void
     {
         $query =$this->db->prepare('INSERT INTO messages(content,user_id,room_id) VALUES(:content,:user_id,:room_id)');
         $parameters=[
             'content' => $message->getContent(),
             'user_id' => $message->getUser_id(),
             'room_id' => $message->getRoom_id()
        ];
         $query->execute($parameters);
     }
     
     public function editMessage(Message $message) :void {
      
      $query = $this->db->prepare('
         UPDATE message
         SET content = :content,
         WHERE id = :id
      
      ');
      
      $parameters = [
       
       'content' => $message->getContent(),
       'id' => $message->getId()
		];
		    $query->execute($parameters);
		    
    }
    public function deleteMessage(Message $message) : void {
      $query = $this->db->prepare('
         DELETE FROM messages
         WHERE messages.id = :id
      ');
      $parameters = [
         'id' => $message->getId()
      ];
      $query->execute($parameters);
   }
     
 }



?>