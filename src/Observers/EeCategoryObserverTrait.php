<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeCategoryObserverTrait
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-product-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Observers;

use TechDivision\Import\Category\Ee\Utils\MemberNames;

/**
 * Observer that create's the category itself for the Magento 2 EE edition.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-product-ee
 * @link      http://www.techdivision.com
 */
trait EeCategoryObserverTrait
{

    /**
     * Return the primary key member name.
     *
     * @return string The primary key member name
     */
    protected function getPkMemberName()
    {
        return MemberNames::ROW_ID;
    }

    /**
     * Tmporary persist the entity ID
     *
     * @param array $category The category to update the IDs
     *
     * @return void
     */
    protected function updatePrimaryKeys(array $category)
    {
        $this->setLastEntityId($category[MemberNames::ENTITY_ID]);
        $this->setLastRowId($category[$this->getPkMemberName()]);
    }

    /**
     * Return's the entity ID for the passed path.
     *
     * @param string $path The path to return the entity ID for
     *
     * @return integer The mapped entity ID
     * @throws \Exception Is thrown, if the path can not be mapped
     */
    protected function mapPath($path)
    {
        return $this->getSubject()->mapPathRowId($path);
    }

    /**
     * Return's the row ID of the product that has been created recently.
     *
     * @return string The row Id
     */
    protected function getLastRowId()
    {
        return $this->getSubject()->getLastRowId();
    }

    /**
     * Set's the row ID of the category that has been created recently.
     *
     * @param string $rowId The row ID
     *
     * @return void
     */
    protected function setLastRowId($rowId)
    {
        $this->getSubject()->setLastRowId($rowId);
    }

    /**
     * Return's the next available category entity ID.
     *
     * @return integer The next available category entity ID
     */
    protected function nextIdentifier()
    {
        return $this->getCategoryBunchProcessor()->nextIdentifier();
    }
}
