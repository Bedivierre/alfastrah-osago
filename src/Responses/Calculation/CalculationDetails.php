<?php


namespace Bedivierre\Alfastrah\Responses\Calculation;

use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Trait CalculationDetails
 * @package Bedivierre\Alfastrah\Responses\Calculation
 * @property float insurance_premium Страховая премия по договору ОСАГО
 * @property float kbm_value Значение КБМ, примененное для расчета договора
 * @property string[]|BaseDataObject kbm_calculation_comment_list
 * @property string kbm_request_rsa_id Идентификатор расчета КБМ в РСА
 * @property boolean need_underwriter_coordination Признак необходимости согласования с андеррайтером
 * @property boolean success Признак успешности расчёта
 * @property string owner_party_request_id Идентификатор значения КБМ собственника. Не заполнен, если собственник не участвовал в расчете КБМ
 * @property string popup_message Критичные замечания для вывода во всплывающем окне
 */
trait CalculationDetails
{

}