<?php


class City
{
    private $_id;
    private $_name;
    private $_country_id;

    public function __construct(array $citiesArray)
    {
        $this->hydrate($citiesArray);
    }

    public function hydrate(array $citiesArray)
    {
        foreach ($citiesArray as $key => $value) {
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
    public function getCountryId()
    {
        return $this->_country_id;
    }

    /**
     * @param mixed $country_id
     */
    public function setCountryId($country_id): void
    {
        $this->_country_id = $country_id;
    }


}