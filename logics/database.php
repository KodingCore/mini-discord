<?php

const DATABASE_NAME = "pierreavril_mini-discord";
const DATABASE_PORT = "3306";
const DATABASE_HOST = "db.3wa.io";
const DATABASE_USERNAME = "pierreavril";
const DATABASE_PASSWORD = "b42ab7763b0f5d442f93ecea7c65f094";

$connexionString = 'mysql:host='.DATABASE_HOST.';port='.DATABASE_PORT.';dbname='.DATABASE_NAME;
$db = new PDO(
   $connexionString,
   DATABASE_USERNAME,
   DATABASE_PASSWORD
);
