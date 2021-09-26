<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\ViewModel\SalesAgent\Listing;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\App\ActionInterface;
use RengaCodz\SoldBy\Model\ResourceModel\SalesPerson\CollectionFactory;

class PrepareData implements ArgumentInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param UrlHelper $urlHelper
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collection = $collectionFactory->create();
    }

    /**
     * Wrapper for the PostHelper::getPostData()
     *
     * @return array
     */
    public function getData():array
    {
        $items = $this->collection->getItems();
        $this->loadedData = array();
        foreach ($items as $item) {
            if ($item->getData('is_active') == 1) {
                $this->loadedData[$item->getId()] = $item->getData('name') .'('. $item->getData('employee_id') . ')';
            }
        }
        return $this->loadedData;
    }
}
