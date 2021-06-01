<?php

class Address
{
    private $_id;
    private $_name;
    private $_number;
    private $_address;
    private $_postal_code;
    private $_city_id;
    private $_country_id;

    public function __construct(array $addressesArray)
    {
        $this->hydrate($addressesArray);
    }

    public function hydrate(array $addressesArray)
    {
        foreach ($addressesArray as $key => $value) {
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
    public function getNumber()
    {
        return $this->_number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->_number = $number;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->_address = $address;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->_postal_code;
    }

    /**
     * @param mixed $postal_code
     */
    public function setPostalCode($postal_code): void
    {
        $this->_postal_code = $postal_code;
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->_city_id;
    }

    /**
     * @param mixed $city_id
     */
    public function setCityId($city_id): void
    {
        $this->_city_id = $city_id;
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
