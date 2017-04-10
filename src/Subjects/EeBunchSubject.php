<?php

/**
 * TechDivision\Import\Category\Ee\Subjects\EeBunchSubject
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

namespace TechDivision\Import\Category\Ee\Subjects;

use TechDivision\Import\Utils\RegistryKeys;
use TechDivision\Import\Category\Subjects\BunchSubject;

/**
 * A SLSB that handles the process to import category bunches.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeBunchSubject extends BunchSubject
{

    /**
     * The row ID of the product that has been created recently.
     *
     * @var integer
     */
    protected $lastRowId;

    /**
     * The mapping for the paths to the created row IDs.
     *
     * @var array
     */
    protected $pathRowIdMapping = array();

    /**
     * The mapping for the supported backend types (for the product entity) => persist methods.
     *
     * @var array
     */
    protected $backendTypes = array(
        'datetime' => array('persistDatetimeAttribute', 'loadCategoryDatetimeAttributeByRowIdAndAttributeIdAndStoreId'),
        'decimal'  => array('persistDecimalAttribute', 'loadCategoryDecimalAttributeByRowIdAndAttributeIdAndStoreId'),
        'int'      => array('persistIntAttribute', 'loadCategoryIntAttributeByRowIdAndAttributeIdAndStoreId'),
        'text'     => array('persistTextAttribute', 'loadCategoryTextAttributeByRowIdAndAttributeIdAndStoreId'),
        'varchar'  => array('persistVarcharAttribute', 'loadCategoryVarcharAttributeByRowIdAndAttributeIdAndStoreId')
    );

    /**
     * Clean up the global data after importing the bunch.
     *
     * @param string $serial The serial of the actual import
     *
     * @return void
     */
    public function tearDown($serial)
    {

        // call parent method
        parent::tearDown($serial);

        // load the registry processor
        $registryProcessor = $this->getRegistryProcessor();

        // update the status up the actual import with SKU => row ID mapping
        $registryProcessor->mergeAttributesRecursive($this->serial, array(RegistryKeys::PATH_ROW_ID_MAPPING => $this->pathRowIdMapping));
    }

    /**
     * Set's the row ID of the product that has been created recently.
     *
     * @param string $lastRowId The row ID
     *
     * @return void
     */
    public function setLastRowId($lastRowId)
    {
        $this->lastRowId = $lastRowId;
    }

    /**
     * Return's the row ID of the product that has been created recently.
     *
     * @return string The row Id
     */
    public function getLastRowId()
    {
        return $this->lastRowId;
    }

    /**
     * Add the passed path => row ID mapping.
     *
     * @param string $path The path
     *
     * @return void
     */
    public function addPathRowIdMapping($path)
    {
        $this->pathRowIdMapping[$path] = $this->getLastRowId();
    }

    /**
     * Return's the category rows with the passed path.
     *
     * @param string $path The path of the category rows to return
     *
     * @return array The category rows
     */
    public function getCategoryRowsByPath($path)
    {
        return $this->getCategoryProcessor()->getCategoryRowsByPath($path);
    }

    /**
     * Return's the next available product entity ID.
     *
     * @return integer The next available product entity ID
     */
    public function nextIdentifier()
    {
        return $this->getCategoryProcessor()->nextIdentifier();
    }

    /**
     * Load's and return's the product with the passed SKU and timestamp.
     *
     * @param string  $sku       The SKU of the product to return
     * @param integer $timestamp The timestamp to find the matching scheduled update
     *
     * @return array The product
     */
    public function loadProductBySkuAndTimestamp($sku, $timestamp)
    {
        return $this->getCategoryProcessor()->loadProductBySkuAndTimestamp($sku, $timestamp);
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
        return  $this->getCategoryProcessor()->loadCategoryDatetimeAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
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
        return  $this->getCategoryProcessor()->loadCategoryDecimalAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
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
        return $this->getCategoryProcessor()->loadCategoryIntAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
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
        return $this->getCategoryProcessor()->loadCategoryTextAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
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
        return $this->getCategoryProcessor()->loadCategoryVarcharAttributeByRowIdAndAttributeIdAndStoreId($rowId, $attributeId, $storeId);
    }
}
