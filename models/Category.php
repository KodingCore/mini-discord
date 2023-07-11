<?php
 
 class Category extends AbstractModel {
     
      private string $name;
     
      public function __construct(string $name) {
        AbstractModel::__construct();
        $this->name=$name;
          
      }
     
      public function  getName() : string
     {
         return $this->name;
     }
     
      public function  setName(string $name)
     {
         return $this->name=$name;
     }
     
     
     
 }