<?php

class ChatController extends AbstractController
{
    private MessageManager $messageManager;
    private RoomManager $roomManager;
    private CategoryManager $categoryManager;
    
    public function __construct()
    {
        global $db;
        $this->messageManager = new MessageManager($db);
        $this->roomManager = new RoomManager($db);
        $this->categoryManager = new CategoryManager($db);
    }
    
    function index() : void
    {
        $room_id = (int) $_GET['room_id'];
        $category_id = (int) $_GET['category_id'];
        $room = $this->roomManager->getRoomById($room_id);
        $category = $this->categoryManager->getCategoryById($category_id);
        
        $messages = $this->messageManager->getAllMessagesByRoomId($room_id);
        
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
            $creation_date = date("Y-m-d H:i:s", time());
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            $room_id = $_POST['room_id'];
            $category_id = $_POST['category_id'];
            
            $message = new Message($content, $creation_date, $user_id, $room_id);
            
            $this->messageManager->addMessage($message);
            
            header("Location: /index.php?route=chat&category_id=$category_id&room_id=$room_id");
            exit();
        }
        
    }
}