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
use TechDivision\Import\Category\Ee\Actions\SequenceCategoryAction;
use TechDivision\Import\Category\Ee\Repositories\CategoryRepository;
use TechDivision\Import\Category\Ee\Repositories\CategoryDatetimeRepository;
use TechDivision\Import\Category\Ee\Repositories\CategoryDecimalRepository;
use TechDivision\Import\Category\Ee\Repositories\CategoryIntRepository;
use TechDivision\Import\Category\Ee\Repositories\CategoryTextRepository;
use TechDivision\Import\Category\Ee\Repositories\CategoryVarcharRepository;

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
     * Initialize the processor with the necessary assembler and repository instances.
     *
     * @param \PDO                                                                     $connection                 The PDO connection to use
     * @param \TechDivision\Import\Category\Ee\Actions\SequenceCategoryAction          $sequenceCategoryAction     The sequence category action to use
     * @param \TechDivision\Import\Category\Ee\Repositories\CategoryRepository         $categoryRepository         The category repository to use
     * @param \TechDivision\Import\Category\Ee\Repositories\CategoryDatetimeRepository $categoryDatetimeRepository The category datetime repository to use
     * @param \TechDivision\Import\Category\Ee\Repositories\CategoryDecimalRepository  $categoryDecimalRepository  The category decimal repository to use
     * @param \TechDivision\Import\Category\Ee\Repositories\CategoryIntRepository      $categoryIntRepository      The category integer repository to use
     * @param \TechDivision\Import\Category\Ee\Repositories\CategoryTextRepository     $categoryTextRepository     The category text repository to use
     * @param \TechDivision\Import\Category\Ee\Repositories\CategoryVarcharRepository  $categoryVarcharRepository  The category varchar repository to use
     * @param \TechDivision\Import\Repositories\EavAttributeRepository                 $eavAttributeRepository     The EAV attribute repository to use
     * @param \TechDivision\Import\Repositories\UrlRewriteRepository                   $urlRewriteRepository       The URL rewrite repository to use
     * @param \TechDivision\Import\Category\Actions\CategoryDatetimeAction             $categoryDatetimeAction     The category datetime action to use
     * @param \TechDivision\Import\Category\Actions\CategoryDecimalAction              $categoryDecimalAction      The category decimal action to use
     * @param \TechDivision\Import\Category\Actions\CategoryIntAction                  $categoryIntAction          The category integer action to use
     * @param \TechDivision\Import\Category\Actions\CategoryAction                     $categoryAction             The category action to use
     * @param \TechDivision\Import\Category\Actions\CategoryTextAction                 $categoryTextAction         The category text action to use
     * @param \TechDivision\Import\Category\Actions\CategoryVarcharAction              $categoryVarcharAction      The category varchar action to use
     * @param \TechDivision\Import\Product\Actions\UrlRewriteAction                    $urlRewriteAction           The URL rewrite action to use
     * @param \TechDivision\Import\Assembler\CategoryAssembler                         $categoryAssembler          The category assembler to use
     */
    public function __construct(
        \PDO $connection,
        SequenceCategoryAction $sequenceCategoryAction,
        CategoryRepository $categoryRepository,
        CategoryDatetimeRepository $categoryDatetimeRepository,
        CategoryDecimalRepository $categoryDecimalRepository,
        CategoryIntRepository $categoryIntRepository,
        CategoryTextRepository $categoryTextRepository,
        CategoryVarcharRepository $categoryVarcharRepository,
        EavAttributeRepository $eavAttributeRepository,
        UrlRewriteRepository $urlRewriteRepository,
        CategoryDatetimeAction $categoryDatetimeAction,
        CategoryDecimalAction $categoryDecimalAction,
        CategoryIntAction $categoryIntAction,
        CatgoryAction $categoryAction,
        CategoryTextAction $categoryTextAction,
        CategoryVarcharAction $categoryVarcharAction,
        UrlRewriteAction $urlRewriteAction,
        CategoryAssembler $categoryAssembler
    ) {

        // set the sequence category action
        $this->setSequenceCategoryAction($sequenceCategoryAction);

        // call the parent constructor
        parent::__construct(
            $connection,
            $categoryRepository,
            $categoryDatetimeRepository,
            $categoryDecimalRepository,
            $categoryIntRepository,
            $categoryVarcharRepository,
            $eavAttributeRepository,
            $urlRewriteRepository,
            $categoryDatetimeAction,
            $categoryDecimalAction,
            $categoryIntAction,
            $categoryAction,
            $categoryTextAction,
            $urlRewriteAction,
            $categoryAssembler
        );
    }

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
