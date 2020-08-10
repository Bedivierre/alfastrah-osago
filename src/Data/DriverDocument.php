<?php


namespace Bedivierre\Alfastrah\Data;

use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string document_number
 * @property string document_series
 * @property string document_type
 * @property string driving_experience_date
 * @property string end_date
 * @property string issue_date
 */
class DriverDocument extends BaseDataObject
{

    public function __construct(string $d_num, string $d_series, string $d_exp_date, string $issue_date = null,
                                string $end_date = null)
    {
        parent::__construct([
            'document_number' => $d_num,
            'document_series' => $d_series,
            'document_type' => AS_Const::DRIVER_IDENTITY_DOCUMENT,
            'driving_experience_date' => $d_exp_date,
            'issue_date' => $issue_date,
            'end_date' => $end_date,
        ]);
    }

    public function onInitialize()
    {
        $this->addRequirement('driving_experience_date', ['pattern'=>'\d{4}-\d{2}-\d{2}']);
        $this->addRequirement('end_date', ['pattern'=>'\d{4}-\d{2}-\d{2}'], false);
        $this->addRequirement('issue_date', ['pattern'=>'\d{4}-\d{2}-\d{2}'], false);
        $this->addRequirement('document_number', 'string');
        $this->addRequirement('document_series', 'string', false);
        $this->addRequirement('document_type', 'string');
    }
}