<?php

class UserManager extends AbstractManager {

   public function getAllUsers() : array {
      $query = $this->db->prepare('SELECT * FROM users');
      $query->execute();
      $users = $query->fetchAll(PDO::FETCH_ASSOC);
      $users = [];
		foreach($users as $user) {
         $userInstance = new User(
            $user['username'],
            $user['email'],
            $user['password']
         );
			array_push($users,$user);
		}
		return $users;
   }
   public function getUserById(int $id) : User {
		$query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		$userInstance = new User(
         $user['username'],
         $user['email'],
         $user['password']
      );
      return $userInstance;
	}
   public function insertUser(User $user) : void {
      $query = $this->db->prepare('
			INSERT INTO users (email, username, password)
			VALUES (:email, :username, :password)
		');
		$parameters = [
			'email' => $user->getEmail(),
			'username' => $user->getUsername(),
			'password' => password_hash($user->getPassword(),PASSWORD_DEFAULT)
		];
		$query->execute($parameters);
   }
}