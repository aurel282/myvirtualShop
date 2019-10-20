<?php

namespace App\ValueObjects;


class AddressValueObject extends AbstractObject
{
    /**
     * @var string
     */
    protected $_street;

    /**
     * @var int
     */
    protected $_number;

    /**
     * @var int
     */
    protected $_zip_code;

    /**
     * @var string
     */
    protected $_country;

    /**
     * @var string
     */
    protected $_city;



    /**
     * AddressValueObject constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->_street = $data['street'];
        $this->_number = $data['number'];
        $this->_zip_code = $data['zip_code'];
        $this->_country = $data['country'];
        $this->_city = $data['city'];
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->_street;
    }

    /**
     * @param string $street
     *
     * @return AddressValueObject
     */
    public function setStreet(string $street): AddressValueObject
    {
        $this->_street = $street;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->_number;
    }

    /**
     * @param int $number
     *
     * @return AddressValueObject
     */
    public function setNumber(int $number): AddressValueObject
    {
        $this->_number = $number;

        return $this;
    }

    /**
     * @return int
     */
    public function getZipCode(): int
    {
        return $this->_zip_code;
    }

    /**
     * @param int $zip_code
     *
     * @return AddressValueObject
     */
    public function setZipCode(int $zip_code): AddressValueObject
    {
        $this->_zip_code = $zip_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->_country;
    }

    /**
     * @param string $country
     *
     * @return AddressValueObject
     */
    public function setCountry(string $country): AddressValueObject
    {
        $this->_country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->_city;
    }

    /**
     * @param string $city
     *
     * @return AddressValueObject
     */
    public function setCity(string $city): AddressValueObject
    {
        $this->_city = $city;

        return $this;
    }


}
