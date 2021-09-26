<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Plugin\Sales\Block\Adminhtml\Order\Create;

class DataPlugin
{
    /**
     * @param \Magento\Sales\Block\Adminhtml\Order\Create\Data $subject
     * @param callable $proceed
     * @param int $id
     * @param boolean $useCache
     * @return string
     */
    public function aroundGetChildHtml(\Magento\Sales\Block\Adminhtml\Order\Create\Data $subject, callable $proceed, $id, $useCache = true)
    {
        $html = $proceed($id, $useCache);

        if ($id == 'form_account') {
            $block = $subject->getChildHtml('soldby_section');
            $html = $html . $block;
        }

        return $html;
    }
}