<?php


namespace Bedivierre\Alfastrah\Responses\Contract;

use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Trait CalculationResponse
 * @package Bedivierre\Alfastrah\Responses\Calculation
 * @property string[]|BaseDataObject comment_list
 * @property InsuranceContractData insurance_contract
 * @property string osago_uuid
 * @property string status
 */
class ContractStatusResponse
{
    const PROCESSING = 'PROCESSING';
    const ERROR = 'ERROR';
    const SUCCESS = 'SUCCESS';
}