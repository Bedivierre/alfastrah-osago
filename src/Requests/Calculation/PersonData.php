<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Alfastrah\Data\DriverDocument;
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
 * @property string first_name
 * @property string last_name
 * @property string middle_name
 * @property string birth_date
 * @property string inn
 * @property string sex
 * @property string snils
 * @property boolean sole_proprietor
 * @property DriverDocument driver_document
 * @property CalculationPersonDocument person_document
 * @property Phone[]|BaseDataObject phones
 */
class PersonData extends BaseDataObject
{
    public function __construct(string $last_name, string $first_name, string $middle_name, string $birth_date,
                                string $email, bool $isMale = true)
    {
        parent::__construct([
            'last_name'=>$last_name,
            'first_name'=>$first_name,
            'middle_name'=>$middle_name,
            'email'=>$email,
            'birth_date'=>$birth_date,
            'sex'=>$isMale ? AS_Const::MALE : AS_Const::FEMALE,
        ]);
    }

    public function onInitialize()
    {
        $this->phones = new BaseDataObject();
        $this->addresses = new BaseDataObject();

        $this->addRequirement('phones', CheckData::TYPE_DATA_OBJECT, false);
        $this->addRequirement('person_document', CheckData::TYPE_DATA_OBJECT);
        $this->addRequirement('driver_document', CheckData::TYPE_DATA_OBJECT, false);
        $this->addRequirement('addresses', CheckData::TYPE_DATA_OBJECT);
        $this->addRequirement('bad_history_basis', 'string', false);
        $this->addRequirement('country', 'string', false);
        $this->addRequirement('email', 'string');
        $this->addRequirement('first_name', 'string');
        $this->addRequirement('last_name', 'string');
        $this->addRequirement('middle_name', 'string', false);
        $this->addRequirement('birth_date', ['pattern'=>'\d{4}-\d{2}-\d{2}']);
        $this->addRequirement('inn', ['pattern'=>'\d{10}'], false);
        $this->addRequirement('sex', ['pattern'=>'MALE|FEMALE']);
        $this->addRequirement('snils', 'string', false);
        $this->addRequirement('sole_proprietor', 'boolean', false);
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
    public function applyPersonDocument(string $document_number, string $document_series, string $issue_date='', string $end_date=''){
        $this->person_document = new CalculationPersonDocument($document_number, $document_series, $issue_date, $end_date);
    }
}