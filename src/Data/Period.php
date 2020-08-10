<?php


namespace Bedivierre\Alfastrah\Data;

use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *  end_date не должен превышать insurance_contract.begin_date на год
 * @property string start_date Начало периода страхования. Формат yyyy-MM-dd
 * @property string end_date Конец периода страхования. Формат yyyy-MM-dd.
 */
class Period extends BaseDataObject
{
    public function __construct(string $start, string $end)
    {
        $start = substr($start, 0, AS_Const::DATE_STR_LENGTH);
        $end = substr($end, 0, AS_Const::DATE_STR_LENGTH);
        parent::__construct([
            'start_date' => $start,
            'end_date' => $end,
        ]);
    }

    public function onInitialize()
    {
        $this->addRequirement('start_date', ['pattern'=>'\d{4}-\d{2}-\d{2}']);
        $this->addRequirement('end_date', ['pattern'=>'\d{4}-\d{2}-\d{2}']);
    }
}