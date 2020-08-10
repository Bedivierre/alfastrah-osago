<?php


namespace Bedivierre\Alfastrah\Responses;


use Bedivierre\Alfastrah\Responses\DefaultError\DefaultError;
use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class BaseResponse
 * @package Bedivierre\Alfastrah\Responses
 *
 * @mixin DefaultError
 */
class BaseResponse extends \Bedivierre\Craftsman\Aqueduct\BaseResponseObject
{
    public function __construct(BaseResponseObject $response)
    {
        $data = new BaseDataObject([
            'headers' => $response->getAllHeaders(),
            'code'=> $response->getHttpCode(),
            'body'=> $response,
        ]);
        parent::__construct($data, $response->getUrl(), $response->getMethod());

        if($response->hasError()){
            $this->setError($response->errorMessage(), $response->errorCode());
            return;
        }

        $this->absorb($response, true, true);
    }
}