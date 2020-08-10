<?php


namespace Bedivierre\Alfastrah\Data;

use Bedivierre\Alfastrah\AS_Config;
use Bedivierre\Craftsman\Masonry\BaseDataObject;

/**
 * Class PersonDocument
 * @package Bedivierre\Alfastrah\Data
 *
 * @property int agent_contract_id
 * @property int channel_sale_id
 * @property int department_id
 * @property int manager_id
 * @property int signer_id
 */
class AgentData extends BaseDataObject
{
    public function __construct()
    {
        parent::__construct([
            'agent_contract_id' => (int)AS_Config::$agent_contract_id,
            'channel_sale_id' => (int)AS_Config::$agent_sale_channel_id,
            'department_id' => (int)AS_Config::$agent_department_id,
            'manager_id' => (int)AS_Config::$agent_manager_id,
            'signer_id' => (int)AS_Config::$agent_signer_id,
        ]);
    }

    public function onInitialize()
    {
        $this->addRequirement('agent_contract_id', 'int');
        $this->addRequirement('channel_sale_id', 'int');
        $this->addRequirement('department_id', 'int');
        $this->addRequirement('manager_id', 'int');
        $this->addRequirement('signer_id', 'int');
    }
}