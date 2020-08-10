<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Alfastrah\Data\DriverData;
use Bedivierre\Alfastrah\Data\DriverDocument;
use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property DriverData driver_data
 * @property DriverData previous_driver_data
 */
class CalculationDriverData extends BaseDataObject
{
    public function __construct(string $last_name, string $first_name, string $middle_name,
                                string $birth_date, bool $isMale)
    {
        parent::__construct([]);
        $this->driver_data = new DriverData($last_name, $first_name, $middle_name, $birth_date, $isMale);

    }
    public function setDriverDocument(string $d_num, string $d_series, string $d_exp_date, string $issue_date = null,
                                      string $end_date = null){
        $this->driver_data->setDriverDocument($d_num, $d_series, $d_exp_date, $issue_date, $end_date);
    }
    public function setGender(bool $isMale){
        $this->driver_data->setGender($isMale);
    }
}