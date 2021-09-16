<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeCategoryAttributeUpdateObserver
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

use TechDivision\Import\Category\Ee\Utils\MemberNames;
use TechDivision\Import\Ee\Observers\EeAttributeObserverTrait;
use TechDivision\Import\Category\Observers\CategoryAttributeUpdateObserver;

/**
 * Observer that provides category attribute update functionality.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeCategoryAttributeUpdateObserver extends CategoryAttributeUpdateObserver
{

    /**
     * The trait providing basic EE product attribute functionality.
     *
     * @var \TechDivision\Import\Ee\Observers\EeAttributeObserverTrait
     */
    use EeAttributeObserverTrait;

    /**
     * Initialize the category with the passed attributes and returns an instance.
     *
     * @param array $attr The category attributes
     *
     * @return array The initialized category
     */
    protected function initializeAttribute(array $attr)
    {

        // try to load the attribute with the passed attribute ID and merge it with the attributes
        if (isset($this->attributes[$attributeId = (integer) $attr[MemberNames::ATTRIBUTE_ID]])) {
            return $this->mergeEntity($this->attributes[$attributeId], $attr);
        }

        // otherwise simply return the attributes
        return $attr;
    }
}
