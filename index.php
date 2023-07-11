<?php
require 'models/AbstractModel.php';
require 'models/Category.php';
require 'models/Message.php';
require 'models/Room.php';
require 'models/User.php';


$categ = new Category("monNom");
var_dump($categ->getName());

var_dump($categ->getId());