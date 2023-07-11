<?php

const DATABASE_NAME = "kevincorvaisier_mini-discord";
const DATABASE_PORT = "3306";
const DATABASE_HOST = "db.3wa.io";
const DATABASE_USERNAME = "kevincorvaisier";
const DATABASE_PASSWORD = "04646b679a4ab0a202f8007ea81fe675";

$connexionString = 'mysql:host='.DATABASE_HOST.';port='.DATABASE_PORT.';dbname='.DATABASE_NAME;
$db = new PDO(
   $connexionString,
   DATABASE_USERNAME,
   DATABASE_PASSWORD
);
