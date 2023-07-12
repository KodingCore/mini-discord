<?php

require 'managers/UserManager.php';

class UserController extends AbstractController
{
    private UserManager $userManager;
    
    public function __construct()
    {
        $this->userManager = new UserManager($db);
    }
    
    public function login()
    {
        if(isset($_POST["email"], $_POST["password"]))
        {
            $userLog = userManager->getUserByEmail($_POST["email"]);
            if(password_verify($_POST["password"], $userLog["password"])
            {
                $this->render('categories/index.phtml', "user" => $userLog);
            }
            else
            {
                $allUsers = $this->userManager->getAllUsers();
                $this->render('user/login.phtml', "users" => $allUsers);
            }
        }else{
            $allUsers = $this->userManager->getAllUsers();
            $this->render('user/login.phtml', "users" => $allUsers);
        }
    }
    
    public function register()
    {
        if(isset($_POST['email'], $_POST['username'], $_POST['password'], $_POST['confirm-password'])
        {
            if($_POST['password'] === $_POST['confirm-password'])
            {
                $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user = new User($_POST['email'], $_POST['username'], $hash);
                $this->userManager->insertUser($user);
                $allUsers = $this->userManager->getAllUsers();
                $this->render('user/login.phtml', "users" => $allUsers);
            }else{
                $this->render('user/register.phtml', []);
            }
        }else{
            $this->render('user/register.phtml', []);
        }
    }
    
    public function account()
    {
        
    }
}