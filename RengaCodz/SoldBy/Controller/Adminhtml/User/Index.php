<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Controller\Adminhtml\User;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'RengaCodz_SoldBy::sales_person';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        try {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->prepend(__('Sales Person'));
            return $resultPage;
        } catch(\Exception $ex){
            echo $ex->getMessage();
            exit;
        }
    }
}
