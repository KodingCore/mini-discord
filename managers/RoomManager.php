<?php

class RoomManager extends AbstractManager{ //PARLE A LA BDD

    function getRooms() : array
    {
        $query = $this->db->prepare('SELECT * FROM rooms');
        $query->execute();
        $rooms = $query->fetchAll(PDO::FETCH_ASSOC);
        $roomsTab = [];
        foreach($rooms as $room)
        {
            $roomInstance = new Room($room["name"], $room["category_id"]);
            array_push($roomsTab, $roomInstance);
        }
        return $roomsTab;
    }
    
    function getRoomById(int $id)
    {
        $query = $this->db->prepare('SELECT * FROM rooms WHERE id = :id');
        $parameters = [
            'id' => $id
            ];
        $query->execute();
        $room = $query->fetch(PDO::FETCH_ASSOC);
        return $room;
    }

    function addRoom(Room $room) : void
    {
        $query = $this->db->prepare('INSERT INTO rooms(name, category_id) VALUES(:name, :category_id)');
        $parameters = [
            'name' => $room->getName(),
            'category_id' => $room->getCategory_id()
        ];
        $query->execute($parameters);
    }

    function removeRoom(Room $room) : void
    {
        $query = $this->db->prepare('DELETE FROM rooms WHERE rooms.id = :id');
        $parameters = [
            'id' => $room->getId()
        ];
        $query->execute($parameters);
    }

    function editRoom(Room $room) : void
    {
        $query = $this->db->prepare('UPDATE rooms SET name = :name, category_id = :category_id WHERE id = :id');
        $parameters = [
            'name' => $room->getName(),
            'category_id' => $room->getCategory_id(),
            'id' => $room->getId()
        ];
        $query->execute($parameters);
    }
}
