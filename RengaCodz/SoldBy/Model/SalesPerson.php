<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use RengaCodz\SoldBy\Api\Data\SalesPersonInterface;

class SalesPerson extends AbstractModel implements SalesPersonInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'sales_person';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('RengaCodz\SoldBy\Model\ResourceModel\SalesPerson');
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getEmployeeId()
    {
        return $this->getData(self::EMPLOYEED_ID);
    }

    /**
     * Get Name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Get Email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Get Status
     *
     * @return string|null
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }


    /**
     * Return identities
     *
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setEmployeeId($id)
    {
        return $this->setData(self::EMPLOYEED_ID, $id);
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set Email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(self::IS_ACTIVE, $email);
    }

    /**
     * Set Status
     *
     * @param int $status
     * @return $this
     */
    public function setIsActive($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
