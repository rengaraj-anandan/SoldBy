<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Controller\Adminhtml\User;

use Magento\Framework\Controller\ResultFactory;

class Add extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'RengaCodz_SoldBy::sales_person';

    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @var \RengaCodz\SoldBy\Model\SalesPersonFactory
     */
    private $spFactory;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \RengaCodz\SoldBy\Model\SalesPersonFactory $spFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \RengaCodz\SoldBy\Model\SalesPersonFactory $spFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->spFactory = $spFactory;
    }

    /**
     * @return @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->spFactory->create();
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            if (!$rowData->getId()) {
                $this->messageManager->addError(__('Invalid Data'));
                $this->_redirect('salesagent/user/index');
            }
        }
        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Sales Person ') : __('Add Sales Person');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
}
