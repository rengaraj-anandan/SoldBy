<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Controller\Adminhtml\User;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\AlreadyExistsException;
use RengaCodz\SoldBy\Model\SalesPersonFactory;

class Save extends Action
{
    const ADMIN_RESOURCE = 'RengaCodz_SoldBy::sales_person';

    /**
     * @var SalesPersonFactory
     */
    protected $spFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param SalesPersonFactory $spFactory
     */
    public function __construct(
        Context $context,
        SalesPersonFactory $spFactory
    ) {
        $this->spFactory = $spFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        try {
            $data = $this->getRequest()->getPostValue();
            $data = $data['sales_person'] ?? [];
            $rowData = $this->spFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Sales Person has been successfully saved.'));
        } catch(AlreadyExistsException $e) {
            $this->messageManager->addError(__('Employee ID Or Email Address Already exists'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
            
        }
        $this->_redirect('salesagent/user/');
    }
}
