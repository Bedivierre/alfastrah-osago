<?php


namespace Bedivierre\Alfastrah\Responses\Calculation;

use Bedivierre\Alfastrah\Data\Period;

/**
 * Trait InsuranceContract
 * @package Bedivierre\Alfastrah\Responses\Calculation
 * @property string agreement_type Тип договора
 * @property string begin_date Дата начала действия договора. Маска yyyy-MM-dd HH:mm:ss
 * @property string end_date Дата окончания действия полиса. Маска yyyy-MM-dd HH:mm:ss
 * @property Period[] operation_periods Период использования
 * @property string discount_program Дисконтная программа
 * @property string previous_contract_number Номер предыдущего договора ОСАГО, при наличии
 * @property string previous_contract_series Серия предыдущего договора ОСАГО, при наличии
 */
trait InsuranceContract
{

}