<?php


namespace Bedivierre\Alfastrah\Requests;


use Bedivierre\Alfastrah\AS_API;
use Bedivierre\Alfastrah\AS_Config;
use Bedivierre\Alfastrah\Requests\Dictionary\VehicleMark;
use Bedivierre\Alfastrah\Requests\Dictionary\VehicleModel;
use Bedivierre\Alfastrah\Responses\BaseResponse;
use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;

class Dictionary
{
    /**
     * Справочник типов адресов
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function addressTypes(){
        $r = new BaseRequest(AS_API::$dictionary_address_type, 'get');
        return $r->get();
    }
    /**
     * Справочник наименований стран
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function countryNames(){
        $r = new BaseRequest(AS_API::$dictionary_country_name, 'get');
        return $r->get();
    }
    /**
     * Справочник документов ЮЛ
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function documentJuridicalNames(){
        $r = new BaseRequest(AS_API::$dictionary_doc_juridical_names, 'get');
        return $r->get();
    }
    /**
     * Справочник документов удостоверяющих личность ФЛ
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function documentPhysicalIdentityNames(){
        $r = new BaseRequest(AS_API::$dictionary_doc_physical_identity_names, 'get');
        return $r->get();
    }
    /**
     * Справочник документов для водителей ФЛ
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function documentPhysicalLicenceNames(){
        $r = new BaseRequest(AS_API::$dictionary_doc_physical_licence_names, 'get');
        return $r->get();
    }
    /**
     * Справочник документов ТС
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function documentVehicleNames(){
        $r = new BaseRequest(AS_API::$dictionary_doc_vehicle_names, 'get');
        return $r->get();
    }
    /**
     * Справочник типов телефонов
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function phoneTypeNames(){
        $r = new BaseRequest(AS_API::$dictionary_phone_type_names, 'get');
        return $r->get();
    }

    /**
     * Справочник целей использования ТС
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function vehiclePurposeNames(){
        $r = new BaseRequest(AS_API::$dictionary_vehicle_purpose_names, 'get');
        return $r->get();
    }
    /**
     * Метод получения всех категорий ТС
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function vehicleCategories(){
        $r = new BaseRequest(AS_API::$dictionary_vehicle_category, 'get');
        return $r->get();
    }
    /**
     * Метод получения всех марок автомобилей
     * @return BaseResponse|BaseResponseObject|VehicleMark[]
     */
    public static function vehicleMark(){
        $r = new BaseRequest(AS_API::$dictionary_vehicle_mark, 'get');
        return $r->get();
    }
    /**
     * Метод получения всех моделей автомобиля по его марке
     * @param int $markId код марки автомобиля, получается из результирующего словаря vehicleMark()
     * @return BaseResponse|BaseResponseObject|VehicleModel[]
     */
    public static function vehicleModel(int $markId){
        $method = str_replace("{id}", $markId, AS_API::$dictionary_vehicle_model);
        $r = new BaseRequest($method, 'get');
        return $r->get();
    }


    /**
     * Метод получения всех оснований применения грубых нарушений
     * @return BaseResponse|BaseResponseObject|string[]
     */
    public static function violations(){
        $r = new BaseRequest(AS_API::$dictionary_violations, 'get');
        return $r->get();
    }
}