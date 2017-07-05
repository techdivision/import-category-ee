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
}
