<?php

require 'AbstractManager.php';

class RoomManager extends AbstractManager{ //PARLE A LA BDD

    function getRooms() : array
    {
        $query = $this->db->prepare('SELECT * FROM rooms');
        $query->execute();
        $rooms = $query->fetchAll(PDO::FETCH_ASSOC);
        $roomsTab = [];
        foreach($rooms as $room)
        {
            $roomInstance = new Room($room["name"]);
            array_push($roomsTab, $roomInstance);
        }
        return $roomsTab;
    }

    function addRoom(Room $room) : void
    {
        $query = $this->db->prepare('INSERT INTO rooms(name) VALUES(:room)');
        $parameters = [
            'room' => $room->getName()
        ];
        $query->execute($parameters);
    }

    function removeRoomById(int $id) : void
    {
        $query = $this->db->prepare('DELETE FROM rooms WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
    }

    function editRoomById(room $room) : void
    {
        $query = $this->db->prepare('REPLACE INTO rooms(name) VALUES(:room) WHERE id = :id');
        $parameters = [
            'room' => $room->getName(),
            'id' => $room->getId()
        ];
        $query->execute($parameters);
    }
}
