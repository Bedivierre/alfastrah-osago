<?php


namespace Bedivierre\Alfastrah\Requests\Calculation;

use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string phone_number
 * @property string phone_type
 */
class Phone extends BaseDataObject
{
    public function __construct(string $phone, $phone_type = null)
    {
        parent::__construct();
        $this->phone_number = $phone;
        $this->phone_type = $phone_type;
        $this->addRequirement('phone_number', ['pattern'=>'\d{11,18}']);
        $this->addRequirement('phone_type', 'string', false);
    }
}