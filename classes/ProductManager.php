<?php


class ProductManager
{
    private $database;

    public function __construct($pdo)
    {
        $this->database = $pdo;
    }

    public function addProduct(Product $product)
    {
        $req = $this->database->prepare('INSERT INTO product (name, description, date_added, stock, picture) VALUES (:name, :description, :dateAdded, :stock, :picture)');
        $req->execute([
            'name' => $product->getName(),
            'decription' => $product->getDescription(),
            'dateAdded' => $product->getDateAdded(),
            'stock' => $product->getStock(),
            'picture' => $product->getPicture(),
        ]);
    }

    public function getProductList()
    {
        $req = $this->database->prepare('SELECT * FROM product ORDER BY name');
        $req->execute();
        $data = $req->fetchAll();

        foreach ($data as $value) {
            $returnArray[] = new User($value);
        }
        return $returnArray;
    }

    public function getProduct($id)
    {
        $req = $this->database->prepare('SELECT * FROM product WHERE id = :id');
        $req->execute(['id' => $id]);
        $data = $req->fetch();

        return new Product($data);
    }

    public function deleteProduct($id)
    {
        $req = $this->database->prepare('DELETE FROM product WHERE id = :id');
        $req->execute(['id' => $id]);
    }

    public function updateProduct(Product $product)
    {
        $req = $this->database->prepare('UPDATE product SET name = :name WHERE id = :id');
        $req->execute([
            'id' => $product->getId(),
            'name' => $product->getName(),
        ]);
    }

}