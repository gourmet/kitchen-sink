<?php

namespace Gourmet\KitchenSink\Model\Table\Traits;

trait ToggleForeignKeyChecksTrait
{

    protected $_fkcToggle = true;

    protected function _toggleForeignKeyChecks()
    {
        $this->_fkcToggle = !$this->_fkcToggle;
        $sql = 'SET FOREIGN_KEY_CHECKS=' . (int)$this->_fkcToggle;
        $this->connection()->execute($sql);
    }
}
