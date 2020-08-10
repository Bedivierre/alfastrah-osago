<?php


namespace Bedivierre\Alfastrah\Requests\Contract;

use Bedivierre\Alfastrah\AS_Const;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string card_number
 * @property string card_series
 * @property string card_type
 * @property string upcoming_maintenance_date
 */
class MaintenanceCard extends BaseDataObject
{
    public function __construct(string $card_number, string $upcoming_maintenance_date, string $card_series = '',
                                string $card_type = AS_Const::VEHICLE_DEFAULT_MAINTENANCE_CARD)
    {
        parent::__construct([
            'card_number'=>$card_number,
            'card_type'=>$card_type,
            'upcoming_maintenance_date'=>$upcoming_maintenance_date,
        ]);
        if($card_series)
            $this->card_series = $card_series;
        $this->addRequirement('upcoming_maintenance_date', ['pattern'=>'\d{4}-\d{2}-\d{2}']);
        $this->addRequirement('card_series', 'string', false);
        $this->addRequirement('card_number', 'string');
        $this->addRequirement('card_type', 'string');
    }
}