<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Model\ResourceModel\SalesPerson;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'RengaCodz\SoldBy\Model\SalesPerson',
            'RengaCodz\SoldBy\Model\ResourceModel\SalesPerson'
        );
    }
}
