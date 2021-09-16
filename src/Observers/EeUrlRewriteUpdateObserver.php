<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeUrlRewriteUpdateObserver
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

use TechDivision\Import\Category\Observers\UrlRewriteUpdateObserver;

/**
 * Observer that creates/updates the category's URL rewrites for Magento 2 EE.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeUrlRewriteUpdateObserver extends UrlRewriteUpdateObserver
{

    /**
     * The trait providing category import functionality.
     *
     * @var \TechDivision\Import\Category\Ee\Observers\EeCategoryObserverTrait
     */
    use EeCategoryObserverTrait;
}
