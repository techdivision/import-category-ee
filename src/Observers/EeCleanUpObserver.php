<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeCleanUpObserver
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

namespace TechDivision\Import\Category\Ee\Observers;

use TechDivision\Import\Category\Utils\ColumnKeys;
use TechDivision\Import\Category\Observers\CleanUpObserver;

/**
 * Observer that finalizes the category import the Magento 2 EE.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeCleanUpObserver extends CleanUpObserver
{

    /**
     * Process the observer's business logic.
     *
     * @return array The processed row
     */
    protected function process()
    {

        // add the path => entity ID mapping
        $this->addPathRowIdMapping($this->getValue(ColumnKeys::PATH));

        // invoke the parent method
        parent::process();
    }

    /**
     * Add the passed path => row ID mapping.
     *
     * @param string $path The path
     *
     * @return void
     */
    protected function addPathRowIdMapping($path)
    {
        $this->getSubject()->addPathRowIdMapping($path);
    }
}
