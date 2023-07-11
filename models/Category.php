<?php
 
 class Category extends AbstactModel {
     
     private string $name;
     
     function getName() : string
     {
         return $this ->name;
     }
     
     function setName(string $name)
     {
         return $this->name=$name;
     }
     
     
     
 }