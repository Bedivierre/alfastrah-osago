<?php


namespace Bedivierre\Alfastrah\Data;

use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property string $full_name
 * @property string $inn
 * @property string $resident
 */
class JuridicalData extends BaseDataObject
{
    public function __construct(string $name, string $inn, bool $resident = true)
    {
        parent::__construct([
            'full_name'=>$name,
            'inn'=>$inn,
            'resident'=>$resident
        ]);
        $this->addRequirement('full_name', 'string');
        $this->addRequirement('inn', ['pattern'=>'[0-9]{10}']);
        $this->addRequirement('resident', 'boolean');
    }
}