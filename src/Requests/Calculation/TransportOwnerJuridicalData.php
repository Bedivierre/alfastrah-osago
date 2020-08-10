<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property Address[]|BaseDataObject addresses
 * @property string bad_history_basis
 * @property string country
 * @property string email
 * @property string full_name
 * @property string inn
 * @property string kpp
 * @property string ogrn
 * @property string short_name
 * @property Phone[]|BaseDataObject phones
 * @property RegistrationDocument registration_document
 */
class TransportOwnerJuridicalData extends BaseDataObject
{
    public function onInitialize()
    {
        $this->phones = new BaseDataObject();
        $this->addresses = new BaseDataObject();

        $this->addRequirement('phones', CheckData::TYPE_DATA_OBJECT);
        $this->addRequirement('registration_document', CheckData::TYPE_DATA_OBJECT);
        $this->addRequirement('addresses', CheckData::TYPE_DATA_OBJECT);
        $this->addRequirement('bad_history_basis', 'string', false);
        $this->addRequirement('country', 'string', false);
        $this->addRequirement('email', 'string');
        $this->addRequirement('full_name', 'string');
        $this->addRequirement('kpp', 'string');
        $this->addRequirement('ogrn', 'string', false);
        $this->addRequirement('inn', ['pattern'=>'\d{10}']);
        $this->addRequirement('resident', 'boolean');
    }

    public function addPhone(Phone $ph){
        $this->phones[] = $ph;
    }
    public function addAddress(Address $ph){
        $this->addresses[] = $ph;
    }
    public function applyAddress(string $location, string $street = '', string $house_number = '', string $building = '',
                                 string $flat = '', string $region = '', string $district = '', string $zip = ''){
        $this->addresses[] = new Address($location, $street, $house_number, $building, $flat, $region, $district, $zip);
    }
}