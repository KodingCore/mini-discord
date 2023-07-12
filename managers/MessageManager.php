<?php

require 'AbstractManager.php';
require '../models/Message.php';

class MessageManager extends AbstractManager
{
   
   function getAllMessagesByRoomId(int $room_id) : array
   {
      $query = $this->db->prepare('SELECT * FROM messages WHERE room_id = :room_id');
      $parameters = [
            'room_id' => $room_id
         ];
      $query->execute($parameters);
      $messages = $query->fetchAll(PDO::FETCH_ASSOC);
      $messagesTab = [];
      foreach($messages as $message)
      {
         $instanceMessage = new Messsage($message["content"], $message["creation_date"], $message["user_id"], $message["room_id"]);
         array_push($messagesTab, $instanceMessage);
      }
      return $messagesTab;
   }

   function addMessage(Message $message): void
   {
      $query = $this->db->prepare('INSERT INTO messages(content,user_id,room_id) VALUES(:content,:user_id,:room_id)');
      $parameters = [
         'content' => $message->getContent(),
         'user_id' => $message->getUser_id(),
         'room_id' => $message->getRoom_id()
      ];
      $query->execute($parameters);
   }

   public function editMessage(Message $message): void
   {

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
   public function deleteMessage(Message $message): void
   {
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
