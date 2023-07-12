<?php

require 'managers/MessageManager.php';

class ChatController extends AbstractController
{
    private MessageManager $messageManager;
    
    public function __construct()
    {
        $this->messageManager = new MessageManager();
    }
    
    function index()
    {
        $messages = $this->messageManager->getAllMessagesByRoomId($_GET["room"]);
        $this->render("chat/index.phtml", $messages);
    }
}