<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Controller\Adminhtml\User;

use RengaCodz\SoldBy\Model\ResourceModel\SalesPerson\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\PageCache\Model\Cache\Type;

class MassDelete extends Action
{
    const ADMIN_RESOURCE = 'RengaCodz_SoldBy::sales_person';
    
    /**
     * @var Filter
     */
    protected $_filter;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var TypeListInterface
     */
    protected $cacheList;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $recordDeleted = 0;
        foreach ($collection as $record) {
            $record->setId($record->getId());
            $record->delete();
            $recordDeleted++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $recordDeleted));
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
