<?php

class HomeController extends AbstractController
{
    function index()
    {
        if(isset($_SESSION["user_id"]))
        {
            header('Location: index.php?route=categories'); 
            exit();
        }
        else
        {
            $this->render('user/login.phtml', []);
        }
    }
}