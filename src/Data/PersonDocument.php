<?php


namespace Bedivierre\Alfastrah\Data;

use Bedivierre\Alfastrah\AS_Const;
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
    public function __construct(string $last_name, string $first_name, string $middle_name, string $birth_date,
                                string $document_series, string $document_number,
                                string $document_type)
    {
        parent::__construct([
            'birth_date' => $birth_date,
            'country' => AS_Const::VEHICLE_DEFAULT_COUNTRY,
            'document_number' => $document_number,
            'document_series' => $document_series,
            'document_type' => $document_type,
            'last_name' => $last_name,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
        ]);
    }

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