<?php


namespace Bedivierre\Alfastrah\Data;

use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string begin_date Дата начала действия договора. Маска yyyy-MM-dd HH:mm:ss
 * @property bool drivers_restriction Признак наличия ограничения по количеству водителей (true - количество ЛДУ
 * ограничено false - количество ЛДУ не ограничено)
 * @property bool follow_to_registration Признак следования к месту регистрации. Если true, то не должны быть
 * заполнены operation_periods
 * @property bool is_rent Признак сдачи ТС в аренду. По умолчанию значение ‘false’
 * @property Period[] operation_periods Период использования. end_date не должен превышать
 * insurance_contract.begin_date на год
 * @property string previous_contract_number Номер предыдущего договора ОСАГО, при наличии
 * @property string previous_contract_series Серия предыдущего договора ОСАГО, при наличии
 * @property string purpose_of_use Наименование цели использования ТС. Значение справочника цели использования.
 * По умолчанию значение ‘Личная’
 * @property bool violations Признак наличия грубых нарушейний страхователя ТС. По умолчанию значение ‘false’
 */
class InsuranceContractData extends BaseDataObject
{
    public function __construct(string $begin_date, string $prev_contract_num = null,
                                string $prev_contract_series = null, bool $is_rent = false,
                                bool $drivers_restriction = true,
                                bool $follow_to_registration = false)
    {
        parent::__construct();
        $this->begin_date = $begin_date;
        $this->drivers_restriction = $drivers_restriction;
        $this->follow_to_registration = $follow_to_registration;
        if($is_rent)
            $this->is_rent = true;
        if(!$follow_to_registration)
            $this->operation_periods = new BaseDataObject();
        if($prev_contract_num)
            $this->previous_contract_number = $prev_contract_num;
        if($prev_contract_series)
            $this->previous_contract_series = $prev_contract_series;

    }

    public function onInitialize()
    {
        $this->addRequirement('begin_date', ['pattern'=>'\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}']);
        $this->addRequirement('drivers_restriction', 'boolean');
        $this->addRequirement('follow_to_registration', 'boolean');
        $this->addRequirement('is_rent', 'bool', false);
        $this->addRequirement('operation_periods', CheckData::TYPE_DATA_OBJECT);
        $this->addRequirement('purpose_of_use', 'string', false);
        $this->addRequirement('previous_contract_number', 'string', false);
        $this->addRequirement('previous_contract_series', 'string', false);
        $this->addRequirement('violations', 'boolean', false);
    }

    public function addOperationPeriod(Period $p){
        $this->operation_periods[] = $p;
    }
}