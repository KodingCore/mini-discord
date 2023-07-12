<?php

session_start();

require_once 'logics/database.php';

require_once 'models/AbstractModel.php';
require_once 'models/Category.php';
require_once 'models/Message.php';
require_once 'models/Room.php';
require_once 'models/User.php';

require_once 'managers/AbstractManager.php';
require_once 'managers/CategoryManager.php';
require_once 'managers/MessageManager.php';
require_once 'managers/RoomManager.php';
require_once 'managers/UserManager.php';

require_once 'controllers/AbstractController.php';
require_once 'controllers/CategoriesController.php';
require_once 'controllers/ChatController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/UserController.php';

$categoriesController = new CategoriesController();
$chatController = new ChatController();
$homeController = new HomeController();
$userController = new UserController();

require_once 'logics/router.php';

if(isset($_GET['route']))
{
    checkRoute($_GET['route']);
}
else
{
    checkRoute('');
}