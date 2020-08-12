<?php


namespace Bedivierre\Alfastrah\Data;


use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDataBlock
 * @package Bedivierre\Alfastrah\Data
 * @property PersonDocument $driver_document
 * @property PersonDocument $person_document
 * @property PersonDocument $previous_driver_document
 * @property PersonDocument $previous_person_document
 */
class PersonDataBlock extends BaseDataObject
{
    public function __construct(string $last_name, string $first_name, string $middle_name, string $birth_date,
                                string $document_series, string $document_number)
    {
        parent::__construct([]);
        $this->addDriverDocument($last_name, $first_name, $middle_name, $birth_date,
            $document_series, $document_number);
        $this->addRequirement('driver_document');
    }
    public function addDriverDocument(string $last_name, string $first_name, string $middle_name, string $birth_date,
                                      string $document_series, string $document_number){
        $this->driver_document = new PersonDocument($last_name, $first_name, $middle_name, $birth_date,
            $document_series, $document_number, AS_Const::DRIVER_IDENTITY_DOCUMENT);
    }
    public function addPersonDocument(string $last_name, string $first_name, string $middle_name, string $birth_date,
                                      string $document_series, string $document_number){
        $this->person_document = new PersonDocument($last_name, $first_name, $middle_name, $birth_date,
            $document_series, $document_number, AS_Const::PASSPORT_IDENTITY_DOCUMENT);
    }
}