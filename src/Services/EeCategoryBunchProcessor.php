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
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Services;

use TechDivision\Import\Loaders\LoaderInterface;
use TechDivision\Import\Dbal\Actions\ActionInterface;
use TechDivision\Import\Dbal\Connection\ConnectionInterface;
use TechDivision\Import\Assembler\CategoryAssemblerInterface;
use TechDivision\Import\Repositories\UrlRewriteRepositoryInterface;
use TechDivision\Import\Repositories\EavAttributeRepositoryInterface;
use TechDivision\Import\Repositories\EavEntityTypeRepositoryInterface;
use TechDivision\Import\Repositories\EavAttributeOptionValueRepositoryInterface;
use TechDivision\Import\Category\Services\CategoryBunchProcessor;
use TechDivision\Import\Category\Assembler\CategoryAttributeAssemblerInterface;
use TechDivision\Import\Category\Repositories\CategoryRepositoryInterface;
use TechDivision\Import\Category\Repositories\CategoryIntRepositoryInterface;
use TechDivision\Import\Category\Repositories\CategoryTextRepositoryInterface;
use TechDivision\Import\Category\Repositories\CategoryVarcharRepositoryInterface;
use TechDivision\Import\Category\Repositories\CategoryDecimalRepositoryInterface;
use TechDivision\Import\Category\Repositories\CategoryDatetimeRepositoryInterface;
use TechDivision\Import\Category\Ee\Actions\SequenceCategoryActionInterface;

/**
 * A processor implementation providing methods to load sequence category data using a PDO connection.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeCategoryBunchProcessor extends CategoryBunchProcessor implements EeCategoryBunchProcessorInterface
{

    /**
     * The action for sequence category CRUD methods.
     *
     * @var \TechDivision\Import\Category\Ee\Actions\SequenceCategoryActionInterface
     */
    protected $sequenceCategoryAction;

    /**
     * Initialize the processor with the necessary assembler and repository instances.
     *
     * @param \TechDivision\Import\Dbal\Connection\ConnectionInterface                       $connection                        The connection to use
     * @param \TechDivision\Import\Category\Ee\Actions\SequenceCategoryActionInterface       $sequenceCategoryAction            The sequence category action to use
     * @param \TechDivision\Import\Category\Repositories\CategoryRepositoryInterface         $categoryRepository                The category repository to use
     * @param \TechDivision\Import\Category\Repositories\CategoryDatetimeRepositoryInterface $categoryDatetimeRepository        The category datetime repository to use
     * @param \TechDivision\Import\Category\Repositories\CategoryDecimalRepositoryInterface  $categoryDecimalRepository         The category decimal repository to use
     * @param \TechDivision\Import\Category\Repositories\CategoryIntRepositoryInterface      $categoryIntRepository             The category integer repository to use
     * @param \TechDivision\Import\Category\Repositories\CategoryTextRepositoryInterface     $categoryTextRepository            The category text repository to use
     * @param \TechDivision\Import\Category\Repositories\CategoryVarcharRepositoryInterface  $categoryVarcharRepository         The category varchar repository to use
     * @param \TechDivision\Import\Repositories\EavAttributeOptionValueRepositoryInterface   $eavAttributeOptionValueRepository The EAV attribute option value repository to use
     * @param \TechDivision\Import\Repositories\EavAttributeRepositoryInterface              $eavAttributeRepository            The EAV attribute repository to use
     * @param \TechDivision\Import\Repositories\UrlRewriteRepositoryInterface                $urlRewriteRepository              The URL rewrite repository to use
     * @param \TechDivision\Import\Repositories\EavEntityTypeRepositoryInterface             $eavEntityTypeRepository           The EAV entity type repository to use
     * @param \TechDivision\Import\Dbal\Actions\ActionInterface                              $categoryDatetimeAction            The category datetime action to use
     * @param \TechDivision\Import\Dbal\Actions\ActionInterface                              $categoryDecimalAction             The category decimal action to use
     * @param \TechDivision\Import\Dbal\Actions\ActionInterface                              $categoryIntAction                 The category integer action to use
     * @param \TechDivision\Import\Dbal\Actions\ActionInterface                              $categoryAction                    The category action to use
     * @param \TechDivision\Import\Dbal\Actions\ActionInterface                              $categoryTextAction                The category text action to use
     * @param \TechDivision\Import\Dbal\Actions\ActionInterface                              $categoryVarcharAction             The category varchar action to use
     * @param \TechDivision\Import\Dbal\Actions\ActionInterface                              $urlRewriteAction                  The URL rewrite action to use
     * @param \TechDivision\Import\Assembler\CategoryAssemblerInterface                      $categoryAssembler                 The category assembler to use
     * @param \TechDivision\Import\Category\Assembler\CategoryAttributeAssemblerInterface    $categoryAttributeAssembler        The assembler to load the category attributes with
     * @param \TechDivision\Import\Loaders\LoaderInterface                                   $rawEntityLoader                   The raw entity loader instance
     */
    public function __construct(
        ConnectionInterface $connection,
        SequenceCategoryActionInterface $sequenceCategoryAction,
        CategoryRepositoryInterface $categoryRepository,
        CategoryDatetimeRepositoryInterface $categoryDatetimeRepository,
        CategoryDecimalRepositoryInterface $categoryDecimalRepository,
        CategoryIntRepositoryInterface $categoryIntRepository,
        CategoryTextRepositoryInterface $categoryTextRepository,
        CategoryVarcharRepositoryInterface $categoryVarcharRepository,
        EavAttributeOptionValueRepositoryInterface $eavAttributeOptionValueRepository,
        EavAttributeRepositoryInterface $eavAttributeRepository,
        UrlRewriteRepositoryInterface $urlRewriteRepository,
        EavEntityTypeRepositoryInterface $eavEntityTypeRepository,
        ActionInterface $categoryDatetimeAction,
        ActionInterface $categoryDecimalAction,
        ActionInterface $categoryIntAction,
        ActionInterface $categoryAction,
        ActionInterface $categoryTextAction,
        ActionInterface $categoryVarcharAction,
        ActionInterface $urlRewriteAction,
        CategoryAssemblerInterface $categoryAssembler,
        CategoryAttributeAssemblerInterface $categoryAttributeAssembler,
        LoaderInterface $rawEntityLoader
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
            $categoryTextRepository,
            $categoryVarcharRepository,
            $eavAttributeOptionValueRepository,
            $eavAttributeRepository,
            $urlRewriteRepository,
            $eavEntityTypeRepository,
            $categoryDatetimeAction,
            $categoryDecimalAction,
            $categoryIntAction,
            $categoryAction,
            $categoryTextAction,
            $categoryVarcharAction,
            $urlRewriteAction,
            $categoryAssembler,
            $categoryAttributeAssembler,
            $rawEntityLoader
        );
    }

    /**
     * Set's the action with the sequence category CRUD methods.
     *
     * @param \TechDivision\Import\Category\Ee\Actions\SequenceCategoryActionInterface $sequenceCategoryAction The action with the sequence category CRUD methods
     *
     * @return void
     */
    public function setSequenceCategoryAction(SequenceCategoryActionInterface $sequenceCategoryAction)
    {
        $this->sequenceCategoryAction = $sequenceCategoryAction;
    }

    /**
     * Return's the action with the sequence category CRUD methods.
     *
     * @return \TechDivision\Import\Category\Ee\Actions\SequenceCategoryActionInterface The action instance
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
