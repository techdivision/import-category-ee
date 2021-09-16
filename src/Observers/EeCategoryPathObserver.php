<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeCategoryPathObserver
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Observers;

use TechDivision\Import\Category\Ee\Utils\ColumnKeys;
use TechDivision\Import\Category\Observers\CategoryPathObserver;

/**
 * Observer that update's the categories path.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeCategoryPathObserver extends CategoryPathObserver
{

    /**
     * Return's the primary key of the category to load.
     *
     * @return integer The primary key of the category
     */
    protected function getPrimaryKey()
    {
        return $this->getValue(ColumnKeys::ROW_ID);
    }
}
