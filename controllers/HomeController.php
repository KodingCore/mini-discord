<?php

class HomeController extends AbstractController
{
    function index()
    {
        if(isset($_SESSION["user_id"]))
        {
            $this->render('categories/index.phtml', []);
        }
        else
        {
            $this->render('user/login.phtml', []);
        }
    }
}