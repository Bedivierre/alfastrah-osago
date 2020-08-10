<?php


namespace Bedivierre\Alfastrah\Data;


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
    public function __construct()
    {
        parent::__construct([]);
        $this->driver_document = new PersonDocument();
        $this->addRequirement('driver_document');
    }
}