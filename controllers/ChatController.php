<?php

require 'managers/MessageManager.php';

class ChatController extends AbstractController
{
    private MessageManager $messageManager;
    
    public function __construct()
    {
        global $db;
        $this->messageManager = new MessageManager($db);
    }
    
    function index() : void
    {
        $room = $_GET['room'];
        $category = $_GET['category'];
        
        $messages = $this->messageManager->getAllMessagesByRoomId($room);
        
        $this->render("chat/index.phtml", [
            "messages" => $messages,
            "room" => $room,
            "category" => $category
        ]);
    }
    
    function sendMessage() : void
    {
        if(!empty($_POST['content']))
        {
            date_default_timezone_set('Europe/Paris');
            $creation_date = date('m/d/Y h:i:s a', time());
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            $room_id = $_POST['room_id'];
            
            $message = new Message($content, $creation_date, $user_id, $room_id);
            
            $this->messageManager->addMessage($message);
            
            header("Location: /index.php?route=chat");
            exit();
        }
        
    }
}