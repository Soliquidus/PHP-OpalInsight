<?php


class Product
{
    private $_id;
    private $_name;
    private $_dateAdded;
    private $_picture;
    private $_description;
    private $_stock;

    public function __construct(array $productsArray)
    {
        $this->hydrate($productsArray);
    }

    public function hydrate(array $productsArray)
    {
        foreach ($productsArray as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->_dateAdded;
    }

    /**
     * @param mixed $dateAdded
     */
    public function setDateAdded($dateAdded): void
    {
        $this->_dateAdded = $dateAdded;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->_picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture): void
    {
        $this->_picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->_description = $description;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->_stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->_stock = $stock;
    }

}