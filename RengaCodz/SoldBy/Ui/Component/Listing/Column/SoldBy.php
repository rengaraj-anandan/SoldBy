<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Ui\Component\Listing\Columns\Column;
use RengaCodz\SoldBy\Model\SalesPersonFactory;
use Magento\Framework\Url;

class SoldBy extends Column
{
    /**
     * @var OrderRepositoryInterface
     */
    protected $_orderRepository;

    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param OrderRepositoryInterface $orderRepository
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        OrderRepositoryInterface $orderRepository,
        SalesPersonFactory $salesPersonFactory,
        Url $urlBuilder, 
        array $components = [],
        array $data = []
    )
    {
        $this->_orderRepository = $orderRepository;
        $this->salesPerson = $salesPersonFactory->create();
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * To prepare sold_by column
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = '';
                $order  = $this->_orderRepository->get($item["entity_id"]);
                if (!empty($order->getData("sold_by"))) {
                    $soldData = $this->salesPerson->load($order->getData("sold_by"));
                    $name = $soldData->getName() . '('. $soldData->getEmployeeId() . ')';
                }
                $item[$this->getData('name')] = $name;
            }
        }
        return $dataSource;
    }
}