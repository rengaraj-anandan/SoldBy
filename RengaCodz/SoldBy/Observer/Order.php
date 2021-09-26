<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Observer;

class Order implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
        $request = $observer->getEvent()->getRequest();
        if(!empty($request) && !empty($request['order']['account']['soldby'])) {
            $orderCreateModel = $observer->getEvent()->getOrderCreateModel();
            $orderCreateModel->getQuote()->setSoldBy($request['order']['account']['soldby']);
        }
		return $this;
	}
}