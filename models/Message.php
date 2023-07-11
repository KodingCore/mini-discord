<?php

require 'AbstractModel.php';

class Message extends AbstractModel
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function setContent(string $content) : void
    {
        $this->content = $content;
    }
}