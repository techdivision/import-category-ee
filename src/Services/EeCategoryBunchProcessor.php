<?php

/**
 * TechDivision\Import\Category\Ee\Services\EeCategoryBunchProcessor
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Services;

use TechDivision\Import\Category\Services\CategoryBunchProcessor;

/**
 * A processor implementation providing methods to load sequence category data using a PDO connection.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeCategoryBunchProcessor extends CategoryBunchProcessor implements EeCategoryBunchProcessorInterface
{

    /**
     * The action for sequence category CRUD methods.
     *
     * @var \TechDivision\Import\Category\Ee\Actions\SequenceCategoryAction
     */
    protected $sequenceCategoryAction;

    /**
     * Set's the action with the sequence category CRUD methods.
     *
     * @param \TechDivision\Import\Category\Ee\Actions\SequenceCategoryAction $sequenceCategoryAction The action with the sequence category CRUD methods
     *
     * @return void
     */
    public function setSequenceCategoryAction($sequenceCategoryAction)
    {
        $this->sequenceCategoryAction = $sequenceCategoryAction;
    }

    /**
     * Return's the action with the sequence category CRUD methods.
     *
     * @return \TechDivision\Import\Category\Ee\Actions\SequenceCategoryAction The action instance
     */
    public function getSequenceCategoryAction()
    {
        return $this->sequenceCategoryAction;
    }

    /**
     * Return's the next available category entity ID.
     *
     * @return integer The next available category entity ID
     */
    public function nextIdentifier()
    {
        return $this->getSequenceCategoryAction()->nextIdentifier();
    }

    /**
     * Load's and return's the datetime attribute with the passed row/attribute/store ID.
     *
     * @param integer $rowId       The row ID of the attribute
     * @param integer $attributeId The attribute ID of the attribute
     * @param integer $storeId     The store ID of the attribute
     *
     * @return array|null The datetime attribute
     */
    public function loadCategoryDatetimeAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId)
    {
        return  $this->getCategoryDatetimeRepository()->findOneByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
    }

    /**
     * Load's and return's the decimal attribute with the passed row/attribute/store ID.
     *
     * @param integer $rowId       The row ID of the attribute
     * @param integer $attributeId The attribute ID of the attribute
     * @param integer $storeId     The store ID of the attribute
     *
     * @return array|null The decimal attribute
     */
    public function loadCategoryDecimalAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId)
    {
        return  $this->getCategoryDecimalRepository()->findOneByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
    }

    /**
     * Load's and return's the integer attribute with the passed row/attribute/store ID.
     *
     * @param integer $rowId       The row ID of the attribute
     * @param integer $attributeId The attribute ID of the attribute
     * @param integer $storeId     The store ID of the attribute
     *
     * @return array|null The integer attribute
     */
    public function loadCategoryIntAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId)
    {
        return $this->getCategoryIntRepository()->findOneByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
    }

    /**
     * Load's and return's the text attribute with the passed row/attribute/store ID.
     *
     * @param integer $rowId       The row ID of the attribute
     * @param integer $attributeId The attribute ID of the attribute
     * @param integer $storeId     The store ID of the attribute
     *
     * @return array|null The text attribute
     */
    public function loadCategoryTextAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId)
    {
        return $this->getCategoryTextRepository()->findOneByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
    }

    /**
     * Load's and return's the varchar attribute with the passed row/attribute/store ID.
     *
     * @param integer $rowId       The row ID of the attribute
     * @param integer $attributeId The attribute ID of the attribute
     * @param integer $storeId     The store ID of the attribute
     *
     * @return array|null The varchar attribute
     */
    public function loadCategoryVarcharAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId)
    {
        return $this->getCategoryVarcharRepository()->findOneByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
    }
}
