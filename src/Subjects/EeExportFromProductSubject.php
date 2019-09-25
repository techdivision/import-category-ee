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
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Subjects;

use TechDivision\Import\Utils\StoreViewCodes;
use TechDivision\Import\Category\Utils\RegistryKeys;
use TechDivision\Import\Category\Ee\Utils\MemberNames;
use TechDivision\Import\Category\Subjects\ExportFromProductSubject;

/**
 * A SLSB that handles the process to import category bunches.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeExportFromProductSubject extends ExportFromProductSubject
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
     * Intializes the previously loaded global data for exactly one bunch.
     *
     * @param string $serial The serial of the actual import
     *
     * @return void
     */
    public function setUp($serial)
    {

        // prepare the callbacks
        parent::setUp($serial);

        // load the status of the actual import
        $status = $this->getRegistryProcessor()->getAttribute(RegistryKeys::STATUS);

        // load the available category path => row ID mappings
        foreach ($this->categories as $resolvedPath => $category) {
            $this->pathRowIdMapping[$this->unifyPath($resolvedPath)] = $category[MemberNames::ROW_ID];
        }

        // load the category path => row ID mappings from the previous subject
        if (isset($status[RegistryKeys::PATH_ROW_ID_MAPPING])) {
            $this->pathRowIdMapping = array_merge($this->pathRowIdMapping, $status[RegistryKeys::PATH_ROW_ID_MAPPING]);
        }
    }

    /**
     * Clean up the global data after importing the variants.
     *
     * @param string $serial The serial of the actual import
     *
     * @return void
     */
    public function tearDown($serial)
    {

        // load the registry processor
        $registryProcessor = $this->getRegistryProcessor();

        // update the status with the actual path => row ID mappings
        $registryProcessor->mergeAttributesRecursive(
            RegistryKeys::STATUS,
            array(
                RegistryKeys::PATH_ROW_ID_MAPPING => $this->pathRowIdMapping
            )
        );

        // invoke the parent method
        parent::tearDown($serial);
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
        $this->pathRowIdMapping[$this->unifyPath($path)] = $this->getLastRowId();
    }

    /**
     * Removes the mapping, e. g. when a category has been deleted.
     *
     * @param string $path The path to delete the mapping for
     *
     * @return void
     */
    public function removePathRowIdMapping($path)
    {
        unset($this->pathRowIdMapping[$this->unifyPath($path)]);
    }

    /**
     * Return's the entity ID for the passed path.
     *
     * @param string $path The path to return the entity ID for
     *
     * @return integer The mapped entity ID
     * @throws \Exception Is thrown, if the path can not be mapped
     */
    public function mapPathRowId($path)
    {

        // query whether or not a entity ID for the passed path has been mapped
        if (isset($this->pathRowIdMapping[$unifiedPath = $this->unifyPath($path)])) {
            return $this->pathRowIdMapping[$unifiedPath];
        }

        // throw an exception if not
        throw new \Exception(
            $this->appendExceptionSuffix(
                sprintf('Can\'t map path %s to any row ID', $path)
            )
        );
    }

    /**
     * Return's the PK column name to create the product => attribute relation.
     *
     * @return string The PK column name
     */
    protected function getPrimaryKeyMemberName()
    {
        return MemberNames::ROW_ID;
    }

    /**
     * Return's TRUE, if the passed URL key varchar value IS related with the actual PK.
     *
     * @param array $categoryVarcharAttribute The varchar value to check
     *
     * @return boolean TRUE if the URL key is related, else FALSE
     */
    public function isUrlKeyOf(array $categoryVarcharAttribute)
    {
        return ((integer) $categoryVarcharAttribute[MemberNames::ROW_ID] === (integer) $this->getLastRowId()) &&
               ((integer) $categoryVarcharAttribute[MemberNames::STORE_ID] === (integer) $this->getRowStoreId(StoreViewCodes::ADMIN));
    }
}
