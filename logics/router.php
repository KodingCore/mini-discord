<?php
function checkRoute(string $route) : void
{
    require 'logics/database.php';
    
    if($route === "categories")
    {
        CategoriesController->index();
    }
    elseif($route === "chat")
    {
        if(isset($_GET["category"], $_GET["room"]))
        {
            ChatController->index();
        }else{
            HomeController->index();
        }
    }
    elseif($route === "chat-sendmessage")
    {
        ChatController->sendMessage();
    }
    elseif($route === "user-register")
    {
        UserController->resister();
    }
    elseif($route === "user-login")
    {
        UserController->login();
    }
    elseif($route === "user-account")
    {
        UserController->account();
    }
    elseif($route === "")
    {
        HomeController->index();
    }
}