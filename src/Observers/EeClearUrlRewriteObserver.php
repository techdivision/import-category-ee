<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeClearUrlRewriteObserver
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Observers;

use TechDivision\Import\Category\Observers\ClearUrlRewriteObserver;

/**
 * Observer that removes the URL rewrite for the category with the path found in the CSV file.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeClearUrlRewriteObserver extends ClearUrlRewriteObserver
{


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
}
