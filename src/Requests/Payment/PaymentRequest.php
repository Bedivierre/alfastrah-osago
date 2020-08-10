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
 * @property string email
 * @property string _osago_uuid
 * @property string _order_id
 */
class PaymentRequest extends BaseRequest
{
    public function __construct(string $uid, string $email, $testmode = null)
    {
        $uri = str_replace('{osago_uuid}', $uid, AS_API::$payment);
        $this->_osago_uuid = $uid;
        $this->email = $email;
        parent::__construct($uri, 'post', $testmode);

        $this->addRequirement('email', function ($email){
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
                return true;
            return false;
        });
    }

    /**
     * @param string $order_id
     * @return BaseResponseObject|BaseResponse|PaymentStatusResponse
     */
    public function status(string $order_id = ''){
        $id = $order_id ? $order_id : $this->_order_id;
        return self::getStatus($this->_osago_uuid, $id);
    }
    /**
     * @param string $osago_uuid
     * @param string $order_id
     * @return BaseResponseObject|BaseResponse|PaymentStatusResponse
     */
    public static function getStatus(string $osago_uuid, string $order_id){
        $r = new PaymentStatusRequest($osago_uuid, $order_id);
        return $r->doRequest();
    }

    /**
     * @param array $data
     * @return BaseResponseObject|BaseResponse|PaymentResponse
     */
    public function doRequest($data = [])
    {
        $r = parent::doRequest($data);
        if($r->order_id)
            $this->_order_id = $r->order_id;
        return $r;
    }
}