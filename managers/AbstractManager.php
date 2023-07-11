<?php

abstract class AbstractManager
{
    protected PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    
}

?>