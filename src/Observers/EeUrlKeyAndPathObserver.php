<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeUrlKeyAndPathObserver
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

namespace TechDivision\Import\Category\Ee\Observers;

use TechDivision\Import\Category\Ee\Utils\MemberNames;

/**
 * Observer that extracts the URL key/path from the category path and
 * adds them as two new columns with the their values for Magento 2 EE.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeUrlKeyAndPathObserver extends \TechDivision\Import\Category\Observers\UrlKeyAndPathObserver
{

    /**
     * The trait providing category import functionality.
     *
     * @var \TechDivision\Import\Category\Ee\Observers\EeCategoryObserverTrait
     */
    use EeCategoryObserverTrait;

    /**
     * Temporarily persist's the IDs of the passed category.
     *
     * @param array $category The category to temporarily persist the IDs for
     *
     * @return void
     */
    protected function setIds(array $category)
    {

        // pass the category to the parent method
        parent::setIds($category);

        // temporarily persist the row ID
        $this->setLastRowId(isset($category[MemberNames::ROW_ID]) ? $category[MemberNames::ROW_ID] : null);
    }
}
