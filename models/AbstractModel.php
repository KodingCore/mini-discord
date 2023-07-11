<?php
abstract class AbstractModel
{
    protected ?int $id;

    public function __construct()
    {
        $this->id = null;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }
}