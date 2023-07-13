<?php

class CategoriesController extends AbstractController
{
    private CategoryManager $categoryManager;
    private RoomManager $roomManager;
    private MessageManager $messageManager;

    public function __construct()
    {
        global $db;
        $this->categoryManager = new CategoryManager($db);
        $this->roomManager = new RoomManager($db);
        $this->messageManager = new MessageManager($db);
    }

    public function index()
    {
        $allCategories = $this->categoryManager->getAllCategories();
        $allRooms = $this->roomManager->getAllRooms();
        $this->render('categories/index.phtml', ["categories" => $allCategories, "rooms" => $allRooms]);
    }
    
    public function selectRoom() : void
    {
        $room_id = (int) $_GET['room_id'];
        $category_id = (int) $_GET['category_id'];
        $room = $this->roomManager->getRoomById($room_id);
        $messages = $this->messageManager->getAllMessagesByRoomId($room_id);
        
        $this->render('chat/index.phtml',["messages" => $messages,"room" => $room]);
    }
}
