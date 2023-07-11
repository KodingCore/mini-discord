<?php
class Room extends AbstractModel
{
    private string $name;

    function getName() : string
    {
        return $this->name;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }
}