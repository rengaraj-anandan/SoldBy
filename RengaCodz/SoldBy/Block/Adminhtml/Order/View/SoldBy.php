<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Block\Adminhtml\Order\View;

class SoldBy extends \Magento\Backend\Block\Template
{
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \RengaCodz\SoldBy\Model\SalesPersonFactory $salesPersonFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \RengaCodz\SoldBy\Model\SalesPersonFactory $salesPersonFactory,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->salesPerson = $salesPersonFactory->create();
        parent::__construct($context, $data);
    }

    /**
     * Retrieve order model instance
     *
     * @return \Magento\Sales\Model\Order
     */
    public function getOrder()
    {
        return $this->_coreRegistry->registry('current_order');
    }

    /**
     * Retrieve SoldBy Info
     * 
     * @return array
     */
    public function getSoldByInfo()
    {
        $record = [];
        $order = $this->getOrder();
        if (!empty($order['sold_by'])) {
            $record = $this->salesPerson->load($order['sold_by']);
        }
        return $record;
    }
}
