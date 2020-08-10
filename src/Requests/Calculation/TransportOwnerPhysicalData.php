<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Alfastrah\Data\DriverDocument;
use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property PersonData person_data
 * @property PersonData previous_person_data
 */
class TransportOwnerPhysicalData extends BaseDataObject
{
    public function __construct(string $last_name, string $first_name, string $middle_name, string $birth_date,
            string $email, bool $isMale = true)
    {
        $this->person_data = new PersonData($last_name, $first_name, $middle_name, $birth_date, $email,
                $isMale);
        parent::__construct([]);
    }

    public function onInitialize()
    {
        $this->addRequirement('person_data', CheckData::TYPE_DATA_OBJECT);
        $this->addRequirement('previous_person_data', CheckData::TYPE_DATA_OBJECT, false);
    }

    public function addPhone(Phone $ph){
        $this->person_data->addPhone($ph);
    }
    public function addAddress(Address $address){
        $this->person_data->addAddress($address);
    }
    public function applyAddress(string $location, string $street = '', string $house_number = '', string $building = '',
                                 string $flat = '', string $region = '', string $district = '', string $zip = ''){
        $this->person_data->applyAddress($location, $street, $house_number, $building, $flat, $region, $district, $zip);
    }
    public function applyPersonDocument(string $document_number, string $document_series, string $issue_date = '', string $end_date = ''){
        $this->person_data->applyPersonDocument($document_number, $document_series, $issue_date, $end_date);
    }
}