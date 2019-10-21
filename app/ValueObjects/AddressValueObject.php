<?php

namespace App\ValueObjects;


class AddressValueObject extends AbstractObject
{
    /**
     * @var ?string
     */
    protected $_street;

    /**
     * @var ?int
     */
    protected $_number;

    /**
     * @var ?int
     */
    protected $_zip_code;

    /**
     * @var ?string
     */
    protected $_country;

    /**
     * @var ?string
     */
    protected $_city;



    /**
     * AddressValueObject constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->_street = isset($data['street']) ? $data['street'] : null;
        $this->_number = isset($data['number']) ? $data['number'] : null;
        $this->_zip_code = isset($data['zip_code']) ? $data['zip_code'] : null;
        $this->_country = isset($data['country']) ? $data['country'] : null;
        $this->_city = isset($data['city']) ? $data['city'] : null;
    }

    /**
     * @return string|null
     */
    public function getStreet() : ?string
    {
        return $this->_street;
    }

    /**
     * @param ?string  $street
     *
     * @return AddressValueObject
     */
    public function setStreet($street)
    {
        $this->_street = $street;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->_number;
    }

    /**
     * @param ?int  $number
     *
     * @return AddressValueObject
     */
    public function setNumber($number)
    {
        $this->_number = $number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZipCode(): ?string
    {
        return $this->_zip_code;
    }

    /**
     * @param mixed $zip_code
     *
     * @return AddressValueObject
     */
    public function setZipCode($zip_code)
    {
        $this->_zip_code = $zip_code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->_country;
    }

    /**
     * @param mixed $country
     *
     * @return AddressValueObject
     */
    public function setCountry($country)
    {
        $this->_country = $country;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param mixed $city
     *
     * @return AddressValueObject
     */
    public function setCity($city)
    {
        $this->_city = $city;

        return $this;
    }




}
