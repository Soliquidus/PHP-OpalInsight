<?php


class AddressManager
{
    private $database;

    public function __construct($pdo)
    {
        $this->database = $pdo;
    }

    public function addAddress(Address $address)
    {
        $req = $this->database->prepare('INSERT INTO address (name, number, address, postal_code, city_id) VALUES (:name, :number, :address, :postal_code, :city_id)');
        $req->execute([
            'name' => $address->getName(),
            'number' => $address->getNumber(),
            'address' => $address->getAddress(),
            'postal_code' => $address->getPostalCode(),
            'city_id' => $address->getCityId(),
            'country_id' => $address->getCountryId()
        ]);
    }

    public function getAddressList()
    {
        $req = $this->database->prepare('SELECT * FROM address ORDER BY id');
        $req->execute();
        $data = $req->fetchAll();

        foreach ($data as $value) {
            $returnArray[] = new Address($value);
        }
        return $returnArray;
    }

    public function getAddress($id)
    {
        $req = $this->database->prepare('SELECT * FROM address WHERE id = :id');
        $req->execute(['id' => $id]);
        $data = $req->fetch();

        return new Address($data);
    }

    public function deleteAddress($id)
    {
        $req = $this->database->prepare('DELETE FROM address WHERE id = :id');
        $req->execute(['id' => $id]);
    }

    public function updateAddress(Address $address)
    {
        $req = $this->database->prepare('UPDATE address SET name = :name, number = :number, address = :address, postal_code = :postal_code, city_id = :city_id, country_id = :country_id WHERE id = :id');
        $req->execute([
            'id' => $address->getId(),
            'name' => $address->getName(),
            'number' => $address->getNumber(),
            'address' => $address->getAddress(),
            'code_postal' => $address->getPostalCode(),
            'city_id' => $address->getCityId(),
            'country_id' => $address->getCountryId()
        ]);
    }
}