<?php

require 'manager/CategoryManager.php';
require 'manager/RoomManager.php';
    
class CategoriesController extends AbstractController
{
      private CategoryManager $categoryManager;
      private RoomManager $roomManager;
     
    public function __construct()
    {
       $this->categoryManager = new CategoryManager($db);
       $this->roomManager = new RoomManager($db);
    }
    
    public function index()
    {
        $allCategories = $this->categoryManager->getAllCategories();
        $allRooms = $this->roomManager->getAllRooms();
        $this->render('categories/index.phtml', ["categories" => $allCategories, "rooms" => $allRooms]);
    }
}