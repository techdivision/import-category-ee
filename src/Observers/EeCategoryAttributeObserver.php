<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeCategoryAttributeObserver
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

use TechDivision\Import\Ee\Observers\EeAttributeObserverTrait;
use TechDivision\Import\Category\Observers\CategoryAttributeObserver;

/**
 * Observer that provides category attribute functionality.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeCategoryAttributeObserver extends CategoryAttributeObserver
{

    /**
     * The trait providing basic EE product attribute functionality.
     *
     * @var \TechDivision\Import\Ee\Observers\EeAttributeObserverTrait
     */
    use EeAttributeObserverTrait;
}
