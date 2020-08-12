<?php


namespace Bedivierre\Alfastrah\Responses\KBM;

use Bedivierre\Alfastrah\Data\JuridicalData;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Trait KBMCalculationDetails
 * @package Bedivierre\Alfastrah\Responses\KBM
 * @property int accident_count
 * @property float kbm
 * @property float original_kbm
 * @property string party_request_end_date
 * @property string party_request_id
 * @property KBMAccidents[]|BaseDataObject accidents
 * @property JuridicalData organization
 * @property KBMContractData previous_contract
 */
trait KBMJuridicalCalculationDetails
{

}