<?php


namespace Bedivierre\Alfastrah\Requests\Payment;


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
use Bedivierre\Alfastrah\Responses\Payment\PaymentResponse;
use Bedivierre\Alfastrah\Responses\Payment\PaymentStatusResponse;
use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * @package Bedivierre\Alfastrah\Requests\Payment
 * @property string _osago_uuid
 * @property string _order_id
 */
class PaymentStatusRequest extends BaseRequest
{
    public function __construct(string $uid, string $order_id, $testmode = null)
    {
        $uri = str_replace('{osago_uuid}', $uid, AS_API::$payment) . "?order_id={$order_id}";
        $this->_osago_uuid = $uid;
        $this->_order_id = $order_id;
        parent::__construct($uri, 'get', $testmode);

    }

    /**
     * @param string $order_id
     * @return BaseResponseObject|BaseResponse|PaymentStatusResponse
     */
    public function status(){
        $id = $this->_order_id;
        return self::getStatus($this->_osago_uuid, $id);
    }
    /**
     * @param string $osago_uuid
     * @param string $order_id
     * @return BaseResponseObject|BaseResponse|PaymentStatusResponse
     */
    public static function getStatus(string $osago_uuid, string $order_id){
        $method = str_replace("{osago_uuid}", $osago_uuid, AS_API::$payment);
        $r = new BaseRequest($method . "?order_id={$order_id}", 'get');
        return $r->get();
    }

    /**
     * @param array $data
     * @return BaseResponseObject|BaseResponse|PaymentStatusResponse
     */
    public function doRequest($data = [])
    {
        return parent::get();
    }
}