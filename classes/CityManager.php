<?php


class CityManager
{
    private $database;

    public function __construct($pdo)
    {
        $this->database = $pdo;
    }

    public function addCity(City $city)
    {
        $req = $this->database->prepare('INSERT INTO city (name, country_id) VALUES (:name, :country_id)');
        $req->execute([
            'name' => $city->getName(),
            'country_id' => $city->getCountryId(),
        ]);
    }

    public function getCityList()
    {
        $req = $this->database->prepare('SELECT * FROM city ORDER BY name');
        $req->execute();
        $data = $req->fetchAll();

        foreach ($data as $value) {
            $returnArray[] = new City($value);
        }
        return $returnArray;
    }

    public function getCity($id)
    {
        $req = $this->database->prepare('SELECT * FROM city WHERE id = :id');
        $req->execute(['id' => $id]);
        $data = $req->fetch();

        return new City($data);
    }

    public function deleteCity($id)
    {
        $req = $this->database->prepare('DELETE FROM city WHERE id = :id');
        $req->execute(['id' => $id]);
    }

    public function updateCity(City $city)
    {
        $req = $this->database->prepare('UPDATE city SET name = :name WHERE id = :id');
        $req->execute([
            'id' => $city->getId(),
            'name' => $city->getName(),
        ]);
    }
}