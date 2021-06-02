<?php


class CountryManager
{
    private $database;

    public function __construct($pdo)
    {
        $this->database = $pdo;
    }

    public function addCountry(Country $country)
    {
        $req = $this->database->prepare('INSERT INTO country (name, code) VALUES (:name, :code)');
        $req->execute([
            'name' => $country->getName(),
            'code' => $country->getCode()
        ]);
    }

    public function getCountryList()
    {
        $req = $this->database->prepare('SELECT * FROM country ORDER BY name');
        $req->execute();
        $data = $req->fetchAll();

        foreach ($data as $value) {
            $returnArray[] = new Country($value);
        }
        return $returnArray;
    }

    public function getCountry($id)
    {
        $req = $this->database->prepare('SELECT * FROM country WHERE id = :id');
        $req->execute(['id' => $id]);
        $data = $req->fetch();

        return new Country($data);
    }

    public function deleteCountry($id)
    {
        $req = $this->database->prepare('DELETE FROM country WHERE id = :id');
        $req->execute(['id' => $id]);
    }

    public function updateCountry(Country $country)
    {
        $req = $this->database->prepare('UPDATE country SET name = :name WHERE id = :id');
        $req->execute([
            'id' => $country->getId(),
            'name' => $country->getName()
        ]);
    }
}