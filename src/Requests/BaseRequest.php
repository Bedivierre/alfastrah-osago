<?php


namespace Bedivierre\Alfastrah\Requests;


use Bedivierre\Alfastrah\AS_Config;
use Bedivierre\Craftsman\Aqueduct\BaseRequestObject;
use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;
use Bedivierre\Craftsman\Aqueduct\Flow\JsonPostDataTransfer;
use Bedivierre\Craftsman\Aqueduct\Flow\SendJsonPostDataTransfer;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * @property string userName
 * @property string password
 *
 * Class BaseRequest
 * @package Bedivierre\Sberbank\Requests
 */
class BaseRequest extends BaseRequestObject
{

    /**
     * @param string $af_method API-метод, к которому обращается запрос.
     * @param bool|null $testmode Тестовый режим для запроса объекта. Если null, то оставляет значение, установленное в
     * SB_Config.php, иначе же переопределяет значение по умолчанию.
     */
    public function __construct($af_method, $method = 'post', $testmode = null)
    {
        $this->_testmode = is_null($testmode) ? (bool) AS_Config::$test_mode : (bool) $testmode;

        $host = $this->_testmode ? AS_Config::$host_test : AS_Config::$host_production;
        parent::__construct(trim($host, '/') . '/' . trim($af_method, '/'), $method, new SendJsonPostDataTransfer());
        $userName = AS_Config::$api_login;
        $password = $this->_testmode ? AS_Config::$api_password_test : AS_Config::$api_password_production;
        $this->setAuth($userName, $password, CURLAUTH_DIGEST);
    }

    /**
     * Возвращает проверку - является ли режим тестовым или нет.
     * @return bool
     */
    public function isTestmode(): bool
    {
        return $this->_testmode;
    }
    /**
     * Возвращает пароль для соединения с API Сбербанка.
     * @return string
     */
    public function getPassword(): string
    {
        return $this->_auth ? $this->_auth->password : '';
    }

    /**
     * Возвращает логин для соединения с API Сбербанка.
     * @return string
     */
    public function getLogin(): string
    {
        return $this->_auth ? $this->_auth->userName : '';
    }

    protected function fetchData()
    {
        return $this;
    }
}