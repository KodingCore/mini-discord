<?php

require 'AbstractManager.php';

class RoomManager extends AbstractManager{ //PARLE A LA BDD

    function listAllRooms() : array
    {
        $query = $this->db->prepare('SELECT * FROM rooms');
        $query->execute();
        $rooms = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rooms;
    }

    function addRoom(Room $room) : void
    {
        $query = $this->db->prepare('INSERT INTO rooms(name) VALUES(:room)');
        $parameters = [
            'room' => $room->getName()
        ];
        $query->execute($parameters);
    }

    function removeroomById(int $id) : void
    {
        $query = $this->db->prepare('DELETE FROM rooms WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
    }

    function editroomById(room $room) : void
    {
        $query = $this->db->prepare('REPLACE INTO rooms(name) VALUES(:room) WHERE id = :id');
        $parameters = [
            'room' => $room->getName(),
            'id' => $room->getId()
        ];
        $query->execute($parameters);
    }
}
