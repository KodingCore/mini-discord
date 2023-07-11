<?php

class Message extends AbstractModel
{
    private string $content;
    private int $user_id;
    private int $room_id;

    public function __construct(string $content , int $user_id , int $room_id)
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
    
    public function getUser_id() : int
    {
        return $this->user_id;
    }
    
    public function getRoom_id() : int
    {
        return $this->room_id;
    }


    public function setContent(string $content) : void
    {
        $this->content = $content;
    }
    
     public function setUser_id(int $user_id) : void
    {
        $this->user_id = $user_id;
    }
    
     public function setRoom_id(int $room_id) : void
    {
        $this->room_id = $room_id;
    }
}