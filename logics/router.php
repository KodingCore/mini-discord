<?php
function checkRoute(string $route) : void
{
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