<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * Обязателен к заполнению как минимум один из district или region.
 * Адрес заполняется согласно подтверждающим данный адрес документам
 *
 * @property string address_type Тип адреса. Значение справочника типов адресов
 * @property string apartment_number Номер квартиры
 * @property string building Корпус/строение
 * @property string country Наименование страны. Значение справочника стран. Значение по умолчанию Россия
 * @property string district Наименование района
 * @property string house_number Номер дома
 * @property string location_place Наименование города или населенного пункта
 * @property string region Наименование области или края
 * @property string street Наименование улицы
 * @property string zip Почтовый индекс
 */
class Address extends BaseDataObject
{
    public function __construct(string $location, string $street = '', string $house_number = '', string $building = '',
                                string $flat = '', string $region = '', string $district = '', string $zip = '')
    {
        parent::__construct([
            'address_type' => AS_Const::ADDRESS_TYPE_REGISTRATION,
            'location_place' => $location,
        ]);
        if($street)
            $this->street = $street;
        if($house_number)
            $this->house_number = $house_number;
        if($building)
            $this->building = $building;
        if($flat)
            $this->apartment_number = $flat;
        if($region)
            $this->region = $region;
        if($district)
            $this->district = $district;
        if($zip)
            $this->zip = $zip;
    }

    public function onInitialize()
    {
        $this->addRequirement('address_type', 'string');
        $this->addRequirement('location_place', 'string');
        $this->addRequirement('apartment_number', 'string', false);
        $this->addRequirement('building', 'string', false);
        $this->addRequirement('country', 'string', false);
        $this->addRequirement('district', 'string', false);
        $this->addRequirement('house_number', 'string', false);
        $this->addRequirement('region', 'string', false);
        $this->addRequirement('street', 'string', false);
        $this->addRequirement('zip', 'string', false);
    }
}