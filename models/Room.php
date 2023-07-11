<?php
class Room extends AbstractModel
{
    private string $name;
    private int $category_id;

    public function __construct(string $name, int $category_id)
    {
        AbstractModel::__construct();
        $this->name = $name;
        $this->category_id = $category_id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
    
    public function getCategory_id() : int
    {
        return $this->category_id;
    }

    public function setCategory_id(int $id)
    {
        $this->category_id = $id;
    }
}