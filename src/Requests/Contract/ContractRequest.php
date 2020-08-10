<?php


namespace Bedivierre\Alfastrah\Requests\Contract;


use Bedivierre\Alfastrah\AS_API;
use Bedivierre\Alfastrah\AS_Config;
use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Alfastrah\Data\AgentData;
use Bedivierre\Alfastrah\Data\DriverData;
use Bedivierre\Alfastrah\Data\InsuranceContractData;
use Bedivierre\Alfastrah\Data\Period;
use Bedivierre\Alfastrah\Requests\BaseRequest;
use Bedivierre\Alfastrah\Responses\BaseResponse;
use Bedivierre\Alfastrah\Responses\Calculation\CalculationResponse;
use Bedivierre\Alfastrah\Responses\Contract\ContractResponse;
use Bedivierre\Alfastrah\Responses\Contract\ContractStatusResponse;
use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class KBM_JuridicalRequest
 * @package Bedivierre\Alfastrah\Requests\KBM
 * @property MaintenanceCard maintenance_card
 * @property string _osago_uuid
 */
class ContractRequest extends BaseRequest
{
    public function __construct(string $uid, $testmode = null)
    {
        $uri = str_replace('{osago_uuid}', $uid, AS_API::$contract);
        $this->_osago_uuid = $uid;
        parent::__construct($uri, 'post', $testmode);

        $this->addRequirement('maintenance_card', CheckData::TYPE_DATA_OBJECT, false);
    }


    public function maintenanceCard(string $card_number, string $upcoming_maintenance_date, string $card_series = '',
                                    string $card_type = AS_Const::VEHICLE_DEFAULT_MAINTENANCE_CARD){

        $this->maintenance_card = new MaintenanceCard($card_number, $upcoming_maintenance_date, $card_series, $card_type);
    }

    /**
     * @return BaseResponseObject|BaseResponse|ContractStatusResponse
     */
    public function status(){
        return self::getStatus($this->_osago_uuid);
    }
    /**
     * @param string $osago_uuid
     * @return BaseResponseObject|BaseResponse|ContractStatusResponse
     */
    public static function getStatus(string $osago_uuid){
        $method = str_replace("{osago_uuid}", $osago_uuid, AS_API::$contract_status);
        $r = new BaseRequest($method, 'get');
        return $r->get();
    }

    /**
     * @param array $data
     * @return BaseResponseObject|BaseResponse|ContractResponse
     */
    public function doRequest($data = [])
    {
        return parent::doRequest($data);
    }
}