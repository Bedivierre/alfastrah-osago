<?php


namespace Bedivierre\Alfastrah\Data;

use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string birth_date
 * @property DriverDocument driver_document
 * @property string country
 * @property string first_name
 * @property string last_name
 * @property string middle_name
 * @property string sex
 */
class DriverData extends BaseDataObject
{
    public function __construct(string $last_name, string $first_name, string $middle_name,
                                string $birth_date, bool $isMale)
    {
        parent::__construct([]);
        $this->birth_date = $birth_date;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->setGender($isMale);
        if(!is_null($middle_name))
            $this->middle_name = $middle_name;
    }

    public function onInitialize()
    {
        $this->addRequirement('birth_date', ['pattern'=>'\d{4}-\d{2}-\d{2}']);
        $this->addRequirement('country', 'string', false);
        $this->addRequirement('driver_document', CheckData::TYPE_DATA_OBJECT);
        $this->addRequirement('sex', ['pattern'=>'MALE|FEMALE']);
        $this->addRequirement('first_name', 'string');
        $this->addRequirement('last_name', 'string');
        $this->addRequirement('middle_name', 'string', false);
    }

    public function setDriverDocument(string $d_num, string $d_series, string $d_exp_date, string $issue_date = null,
                string $end_date = null){
        $this->driver_document = new DriverDocument($d_num, $d_series, $d_exp_date, $issue_date, $end_date);
    }

    public function setGender(bool $isMale){
        $this->sex = $isMale ? 'MALE' : 'FEMALE';
    }
}