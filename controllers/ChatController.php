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
    
    function index()
    {
        $messages = $this->messageManager->getAllMessagesByRoomId($_GET["room"]);
        $this->render("chat/index.phtml", $messages);
    }
}