<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property TransportOwnerJuridicalData organization
 * @property TransportOwnerPhysicalData person
 */
class TransportOwnerData extends BaseDataObject
{
    public function __construct($isOrganisation = false)
    {
        parent::__construct();
    }

    public function applyPersonData(TransportOwnerPhysicalData $data){
        $this->person = $data;
    }
    public function setPersonData(string $last_name, string $first_name, string $middle_name, string $birth_date,
                                  string $email, bool $isMale = true){
        $this->applyPersonData(new TransportOwnerPhysicalData($last_name, $first_name, $middle_name, $birth_date, $email, $isMale));
    }

    public function applyPersonDocument(string $document_number, string $document_series, string $issue_date = '', string $end_date = ''){
        if($this->person)
            $this->person->applyPersonDocument($document_number, $document_series, $issue_date, $end_date);
    }

    public function applyJuridicalData(TransportOwnerJuridicalData $data){
        $this->organization = $data;
    }
    public function setJuridicalData(){
        $this->applyJuridicalData(new TransportOwnerJuridicalData());
    }


    public function addPhone(Phone $ph){
        if($this->person)
            $this->person->addPhone($ph);
        if($this->organization)
            $this->organization->addPhone($ph);
    }
    public function addAddress(Address $address){
        if($this->person)
            $this->person->addAddress($address);
        if($this->organization)
            $this->organization->addAddress($address);
    }
    public function applyAddress(string $location, string $street = '', string $house_number = '', string $building = '',
                                 string $flat = '', string $region = '', string $district = '', string $zip = ''){
        if($this->person)
            $this->person->applyAddress($location, $street, $house_number, $building, $flat, $region, $district, $zip);
        if($this->organization)
            $this->organization->applyAddress($location, $street, $house_number, $building, $flat, $region, $district, $zip);
    }
}