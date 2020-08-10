<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string body_number
 * @property string chassis_number
 * @property string licence_plate
 * @property string vin
 */
class VehicleIdentity extends BaseDataObject
{
    public function __construct(string $licence_plate, string $body_number = '', string $chassis_number = '', string $vin = '')
    {
        parent::__construct();
        $this->licence_plate = $licence_plate;
        if($body_number)
            $this->body_number = $body_number;
        if($chassis_number)
            $this->chassis_number = $chassis_number;
        if($vin)
            $this->vin = $vin;

        $this->addRequirement('body_number', 'string', false);
        $this->addRequirement('chassis_number', 'string', false);
        $this->addRequirement('vin', 'string', false);
        $this->addRequirement('licence_plate', 'string', false);
    }
}