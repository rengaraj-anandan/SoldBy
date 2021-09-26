<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SalesPerson extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('sales_person', 'id');
    }
}
