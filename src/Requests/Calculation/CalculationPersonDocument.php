<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string end_date
 * @property string issue_date
 * @property string document_number
 * @property string document_series
 * @property string document_type
 */
class CalculationPersonDocument extends BaseDataObject
{
    public function __construct(string $document_number, string $document_series, string $issue_date = '', string $end_date = '')
    {
        parent::__construct([
            'document_type'=>AS_Const::PASSPORT_IDENTITY_DOCUMENT,
            'document_number' => $document_number,
            'document_series' => $document_series,
        ]);
        if($issue_date)
            $this->issue_date = $issue_date;
        if($end_date)
            $this->end_date = $end_date;
    }

    public function onInitialize()
    {
        $this->addRequirement('end_date', ['pattern'=>'\d{4}-\d{2}-\d{2}'], false);
        $this->addRequirement('issue_date', ['pattern'=>'\d{4}-\d{2}-\d{2}'], false);
        $this->addRequirement('document_series', 'string', false);
        $this->addRequirement('document_number', 'string');
        $this->addRequirement('document_type', 'string');
    }
}