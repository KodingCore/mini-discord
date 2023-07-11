<?php

class Message extends AbstractModel
{
    private string $content;
    private string $creation_date;
    private int $user_id;
    private int $room_id;

    public function __construct(string $content,string $creation_date, int $user_id, int $room_id)
    {
        AbstractModel::__construct();
        $this->content = $content;
        $this->creation_date = $creation_date;
        $this->user_id = $user_id;
        $this->room_id = $room_id;
    }

    public function getContent(): string
    {
        return $this->content;
    }
    
    public function getCreation_date(): string
    {
        return $this->creation_date;
    }

    public function getUser_id(): int
    {
        return $this->user_id;
    }

    public function getRoom_id(): int
    {
        return $this->room_id;
    }


    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    
    public function setCreation_date(string $creation_date):void
    {
        $this->content = $creation_date;
    }

    public function setUser_id(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setRoom_id(int $room_id): void
    {
        $this->room_id = $room_id;
    }
}
