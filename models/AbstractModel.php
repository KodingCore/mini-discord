<?php
abstract class AbstractModel
{
    protected ?int $id;

    public function __construct(?int $id = null)
    {
        $this->id = $id;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $îd) : void
    {
        $this->id = $id;
    }
}