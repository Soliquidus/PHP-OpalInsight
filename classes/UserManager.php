<?php


class UserManager
{
    private $database;

    public function __construct($pdo)
    {
        $this->database = $pdo;
    }

    public function addUser(User $user)
    {
        $req = $this->database->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :password)');
        $req->execute([
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ]);
    }

    public function getUserList()
    {
        $req = $this->database->prepare('SELECT * FROM user ORDER BY username');
        $req->execute();
        $data = $req->fetchAll();

        foreach ($data as $value) {
            $returnArray[] = new User($value);
        }
        return $returnArray;
    }

    public function getUser($id)
    {
        $req = $this->database->prepare('SELECT * FROM user WHERE id = :id');
        $req->execute(['id' => $id]);
        $data = $req->fetch();

        return new User($data);
    }

    public function deleteUser($id)
    {
        $req = $this->database->prepare('DELETE FROM user WHERE id = :id');
        $req->execute(['id' => $id]);
    }

    public function updateUser(User $user)
    {
        $req = $this->database->prepare('UPDATE user SET username = :username WHERE id = :id');
        $req->execute([
           'id' => $user->getId(),
           'username' => $user->getUsername()
        ]);
    }
}