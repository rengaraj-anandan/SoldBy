<?php
/**
 * @author Rengaraj
 */
namespace RengaCodz\SoldBy\Api\Data;

/**
 * SalesPerson interface
 */
interface SalesPersonInterface
{
    const ID = 'id';
    const EMPLOYEED_ID = 'employee_id';
    const NAME = 'name';
    const EMAIL = 'email';
    const IS_ACTIVE = 'is_active';
    
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getEmployeeId();

    /**
     * Get Name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Get Email
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Get Status
     *
     * @return string|null
     */
    public function getIsActive();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setEmployeeId($id);

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Set Email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Set Status
     *
     * @param int $status
     * @return $this
     */
    public function setIsActive($status);
}
