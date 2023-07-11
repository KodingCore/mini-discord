<?php

const DATABASE_NAME = ;
const DATABSE_PORT = ;
const DATABASE_HOST = ;
const DATABASE_USERNAME = ;
const DATABASE_PASSWORD = ;

$connexionString = 'mysql:host='.DATABSE_HOST.';port='.DATABASE_PORT.';dbname='.DATABASE_NAME;
$db = new PDO(
   $connexionString,
   DATABASE_USERNAME,
   DATABASE_PASSWORD
);
