<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string category
 * @property VehicleIdentity identity
 * @property string mark
 * @property int max_allowed_weight
 * @property string model
 * @property int passenger_capacity
 * @property float power_hp
 * @property int production_year
 * @property string registration_country
 * @property RegistrationDocument[]|BaseDataObject registration_documents
 * @property boolean use_with_trailer
 */
class VehicleData extends BaseDataObject
{
    public function __construct(string $category, string $mark, string $model, int $production_year,
                                float $power_hp, bool $use_with_trailer, string $registration_country = AS_Const::VEHICLE_DEFAULT_COUNTRY)
    {
        parent::__construct([
            'category'=>$category,
            'mark'=>$mark,
            'model'=>$model,
            'production_year'=>$production_year,
            'power_hp'=>$power_hp,
            'use_with_trailer'=>$use_with_trailer,
            'registration_country' => $registration_country,
        ]);
    }

    public function setIdentity(string $licence_plate, string $body_number = '', string $chassis_number = '', string $vin = ''){
        $this->identity = new VehicleIdentity($licence_plate, $body_number, $chassis_number, $vin);
    }
    public function setDocument(string $document_number, string $document_series,
                                string $issue_date = '', string $end_date = '',
                                string $document_type = AS_Const::VEHICLE_IDENTITY_DOCUMENT){
        if(!$this->registration_documents)
            $this->registration_documents = new BaseDataObject();
        $this->registration_documents[] = new RegistrationDocument($document_number, $document_series, $issue_date,
            $end_date, $document_type);
    }
}