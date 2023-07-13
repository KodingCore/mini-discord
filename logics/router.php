<?php
function checkRoute(string $route) : void
{
    global $homeController;
    global $userController;
    global $chatController;
    global $categoriesController;
    
    if($route === "categories")
    {
        $categoriesController->index();
    }
    elseif($route === "categories-selectroom")
    {
        $categoriesController->selectRoom();
    }
    elseif($route === "chat")
    {
        if(isset($_GET["category_id"], $_GET["room_id"]))
        {
            $chatController->index();
        }
        else
        {
            $homeController->index();
        }
    }
    elseif($route === "chat-sendmessage")
    {
        $chatController->sendMessage();
    }
    elseif($route === "user-register")
    {
        $userController->register();
    }
    elseif($route === "user-login")
    {
        $userController->login();
    }
    elseif($route === "user-account")
    {
        $userController->account();
    }
    elseif($route === "user-logout")
    {
        $userController->logout();
    }
    elseif($route === "")
    {
        $homeController->index();
    }
}