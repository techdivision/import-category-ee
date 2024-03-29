<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeClearCategoryObserver
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Observers;

use TechDivision\Import\Category\Ee\Utils\ColumnKeys;
use TechDivision\Import\Category\Observers\ClearCategoryObserver;

/**
 * Observer that removes the category with the path found in the CSV file for Magento 2 EE.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeClearCategoryObserver extends ClearCategoryObserver
{

    /**
     * The trait providing category import functionality.
     *
     * @var \TechDivision\Import\Category\Ee\Observers\EeCategoryObserverTrait
     */
    use EeCategoryObserverTrait;

    /**
     * Process the observer's business logic.
     *
     * @return array The processed row
     */
    protected function process()
    {

        // query whether or not, we've found a new path => means we've found a new category
        if ($this->hasBeenProcessed($path = $this->getValue(ColumnKeys::PATH))) {
            return;
        }

        // process the parent instance
        parent::process();

        // remove the path => row ID mapping from the subject
        $this->removePathRowIdMapping($path);
    }

    /**
     * Removes the mapping, e. g. when a category has been deleted.
     *
     * @param string $path The path to delete the mapping for
     *
     * @return void
     */
    protected function removePathRowIdMapping($path)
    {
        $this->getSubject()->removePathRowIdMapping($path);
    }
}
