<?php

class Message extends AbstractModel
{
    private string $content;
    private int $user_id;
    private int $room_id;

    public function __construct(string $content)
    {
        AbstractModel::__construct();
        $this->content = $content;
        $this->user_id = $user_id;
        $this->room_id = $room_id;
        
        
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