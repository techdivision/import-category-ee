<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeCategoryObserverTrait
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
 * @link      https://github.com/techdivision/import-product-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Observers;

use TechDivision\Import\Category\Utils\ColumnKeys;
use TechDivision\Import\Category\Ee\Utils\MemberNames;

/**
 * Observer that create's the category itself for the Magento 2 EE edition.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-product-ee
 * @link      http://www.techdivision.com
 */
trait EeCategoryObserverTrait
{

    /**
     * Process the observer's business logic.
     *
     * @return void
     */
    protected function process()
    {

        // query whether or not, we've found a new path => means we've found a new category
        if ($this->hasBeenProcessed($path = $this->getValue(ColumnKeys::PATH))) {
            return;
        }

        // explode the path into the category names
        if ($categories = $this->explode($path, '/')) {
            // initialize the artefacts and reset the category IDs
            $artefacts = array();
            $this->categoryIds = array();

            // iterate over the category names and try to load the categegory therefore
            for ($i = sizeof($categories); $i > 0; $i--) {
                try {
                    // prepare the expected category name
                    $categoryPath = implode('/', array_slice($categories, 0, $i));
                    // load the existing category and prepend the ID the array with the category IDs
                    $existingCategory = $this->getCategoryByPath($categoryPath);
                    array_unshift($this->categoryIds, $existingCategory[MemberNames::ENTITY_ID]);

                } catch (\Exception $e) {
                    $this->getSystemLogger()->debug(sprintf('Can\'t load category %s, create a new one', $categoryPath));
                }
            }

            // prepare the static entity values, insert the entity and set the entity ID
            $category = $this->initializeCategory($this->prepareAttributes());
            $this->setLastEntityId($entityId = $category[MemberNames::ENTITY_ID]);
            $this->setLastRowId($rowId = $this->persistCategory($category));

            //update the persisted category with the entity ID
            $category[MemberNames::ROW_ID] = $rowId;
            $category[MemberNames::URL_KEY] = $this->getValue(ColumnKeys::URL_KEY);

            // append the category to the list
            $this->addCategory($path, $category);

            // append the ID of the new category to array with the IDs
            array_push($this->categoryIds, $entityId);

            // prepare the artefact
            $artefact = array(
                MemberNames::ROW_ID => $rowId,
                MemberNames::PATH   => implode('/', $this->categoryIds)
            );

            // put the artefact on the stack
            $artefacts[] = $artefact;

            // add the artefacts
            $this->addArtefacts($artefacts);
        }
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
        return $this->getSubject()->nextIdentifier();
    }
}
