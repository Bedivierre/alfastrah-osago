<?php


namespace Bedivierre\Alfastrah\Data;

use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string $birth_date
 * @property string $country
 * @property string $document_number
 * @property string $document_series
 * @property string $document_type
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 */
class PersonDocument extends BaseDataObject
{
    public function onInitialize()
    {
        $this->addRequirement('birth_date', ['pattern'=>'\d{4}-\d{2}-\d{2}']);
        $this->addRequirement('country', 'string', false);
        $this->addRequirement('document_number', ['pattern'=>'[0-9\w\s]{1,50}']);
        $this->addRequirement('document_series', ['pattern'=>'[0-9\w\s]{1,40}'], false);
        $this->addRequirement('document_type', 'string');
        $this->addRequirement('first_name', 'string');
        $this->addRequirement('last_name', 'string');
        $this->addRequirement('middle_name', 'string', false);
    }
}