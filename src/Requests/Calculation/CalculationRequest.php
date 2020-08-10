<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;


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
use Bedivierre\Craftsman\Appraise\CheckData;
use Bedivierre\Craftsman\Aqueduct\BaseResponseObject;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class KBM_JuridicalRequest
 * @package Bedivierre\Alfastrah\Requests\KBM
 * @property AgentData agent
 * @property CalculationDriverData[]|BaseDataObject drivers
 * @property InsuranceContractData insurance_contract
 * @property TransportOwnerData transport_insurer
 * @property TransportOwnerData transport_owner
 * @property VehicleData vehicle
 */
class CalculationRequest extends BaseRequest
{
    public function __construct($testmode = null)
    {
        parent::__construct(AS_API::$calculation, 'post', $testmode);
        $this->agent = new AgentData();
        $this->addRequirement('agent', CheckData::TYPE_DATA_OBJECT);

        $this->drivers = new BaseDataObject();
        $this->addRequirement('drivers', CheckData::TYPE_DATA_OBJECT, false);
        $this->addRequirement('insurance_contract', CheckData::TYPE_DATA_OBJECT);

        $this->addRequirement('transport_insurer', function (TransportOwnerData $ti){
            if($ti->organization)
                return $ti->organization->checkRequirements();
            return $ti->person->checkRequirements();
        });
        $this->addRequirement('transport_owner', function (TransportOwnerData $to){
            if($to->organization)
                return $to->organization->checkRequirements();
            return $to->person->checkRequirements();
        });
        $this->addRequirement('vehicle', CheckData::TYPE_DATA_OBJECT);
    }

    public function addDriver(CalculationDriverData $data){
        if($this->insurance_contract && !$this->insurance_contract->drivers_restriction) {
            return;
        }
        if(!$this->drivers)
            $this->drivers = new BaseDataObject();
        $this->drivers[] = $data;
    }

    /**
     * @param string $begin_date в формате yyyy-mm-dd HH:mm:ss
     * @param string $end_date в формате yyyy-mm-dd
     * @param bool $drivers_restriction Указывает, есть ли ограничение на количество водителей
     * @param string|null $prev_contract_num
     * @param string|null $prev_contract_series
     * @param bool $is_rent Указывает, сдается ли ТС в аренду
     * @param bool $follow_to_registration Указывает, ведется ли ТС к месту регистрации. Если true,
     *      InsuranceContractData::operation_periods не должно быть установлено.
     */
    public function setInsuranceContract(string $begin_date, string $end_date, string $prev_contract_num = null,
                                         string $prev_contract_series = null, bool $drivers_restriction = true, bool $is_rent = false,
                                         bool $follow_to_registration = false){
        $ic = new InsuranceContractData($begin_date, $prev_contract_num, $prev_contract_series,
            $is_rent, $drivers_restriction, $follow_to_registration);
        if(!$follow_to_registration)
            $ic->addOperationPeriod(new Period($begin_date, $end_date));
        if(!$drivers_restriction)
            $this->removeMember($this->drivers);
        $this->insurance_contract = $ic;
    }
    public function applyInsuranceContract(InsuranceContractData $data){
        $this->insurance_contract = $data;
    }

    public function insurerPersonApply(TransportOwnerPhysicalData $data){
        if(!$this->transport_insurer)
            $this->transport_insurer = new TransportOwnerData();
        $this->transport_insurer->applyPersonData($data);
    }
    public function insurerPerson(string $last_name, string $first_name, string $middle_name, string $birth_date,
                                  string $email, bool $isMale = true){
        if(!$this->transport_insurer)
            $this->transport_insurer = new TransportOwnerData();
        $this->transport_insurer->setPersonData($last_name, $first_name, $middle_name, $birth_date, $email, $isMale);
    }
    public function insurerJuridicalApply(TransportOwnerJuridicalData $data){
        if(!$this->transport_insurer)
            $this->transport_insurer = new TransportOwnerData();
        $this->transport_insurer->applyJuridicalData($data);
    }
    public function insurerJuridical(){
        if(!$this->transport_insurer)
            $this->transport_insurer = new TransportOwnerData();
        $this->transport_insurer->setJuridicalData();
    }
    public function insurerPhone(string $ph){
        $this->transport_insurer->addPhone(new Phone($ph));
    }
    public function insurerPhoneApply(Phone $ph){
        $this->transport_insurer->addPhone($ph);
    }
    public function insurerAddress(string $location, string $street = '', string $house_number = '', string $building = '',
                                        string $flat = '', string $region = '', string $district = '', string $zip = ''){
        $this->transport_insurer->applyAddress($location, $street, $house_number, $building, $flat, $region, $district, $zip);
    }
    public function insurerPersonDocument(string $document_number, string $document_series, string $issue_date = '', string $end_date = ''){
        $this->transport_insurer->applyPersonDocument($document_number, $document_series, $issue_date, $end_date);
    }


    public function ownerPersonApply(TransportOwnerPhysicalData $data){
        if(!$this->transport_owner)
            $this->transport_owner = new TransportOwnerData();
        $this->transport_owner->applyPersonData($data);
    }
    public function ownerPerson(string $last_name, string $first_name, string $middle_name, string $birth_date,
                                  string $email, bool $isMale = true){
        if(!$this->transport_owner)
            $this->transport_owner = new TransportOwnerData();
        $this->transport_owner->setPersonData($last_name, $first_name, $middle_name, $birth_date, $email, $isMale);
    }
    public function ownerJuridicalApply(TransportOwnerJuridicalData $data){
        if(!$this->transport_owner)
            $this->transport_owner = new TransportOwnerData();
        $this->transport_owner->applyJuridicalData($data);
    }
    public function ownerJuridical(){
        if(!$this->transport_owner)
            $this->transport_owner = new TransportOwnerData();
        $this->transport_owner->setJuridicalData();
    }

    public function ownerPhone(string $ph){
        $this->transport_owner->addPhone(new Phone($ph));
    }
    public function ownerPhoneApply(Phone $ph){
        $this->transport_owner->addPhone($ph);
    }
    public function ownerAddress(string $location, string $street = '', string $house_number = '', string $building = '',
                                        string $flat = '', string $region = '', string $district = '', string $zip = ''){
        $this->transport_owner->applyAddress($location, $street, $house_number, $building, $flat, $region, $district, $zip);
    }
    public function ownerPersonDocument(string $document_number, string $document_series, string $issue_date = '', string $end_date = ''){
        $this->transport_owner->applyPersonDocument($document_number, $document_series, $issue_date, $end_date);
    }

    public function vehicleApply(string $category, string $mark, string $model,
                                int $production_year, float $power_hp, bool $use_with_trailer = false)
    {
        $this->vehicle = new VehicleData($category, $mark, $model, $production_year, $power_hp, $use_with_trailer);
    }

    public function vehicleIdentity(string $licence_plate, string $body_number = '', string $chassis_number = '', string $vin = ''){
        if($this->vehicle)
            $this->vehicle->setIdentity($licence_plate, $body_number, $chassis_number, $vin);
    }
    public function vehicleDocument(string $document_number, string $document_series,
                                string $issue_date = '', string $end_date = '',
                                string $document_type = AS_Const::VEHICLE_IDENTITY_DOCUMENT){
        if($this->vehicle)
        $this->vehicle->setDocument($document_number, $document_series, $issue_date, $end_date, $document_type);
    }

    /**
     * @param array $data
     * @return BaseResponseObject|BaseResponse|CalculationResponse
     */
    public function doRequest($data = [])
    {
        return parent::doRequest($data);
    }
}