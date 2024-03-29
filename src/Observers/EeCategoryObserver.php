<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeCategoryObserver
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-product-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Observers;

use TechDivision\Import\Category\Ee\Utils\MemberNames;
use TechDivision\Import\Category\Observers\CategoryObserver;
use TechDivision\Import\Ee\Utils\SqlConstants;
use TechDivision\Import\Dbal\Utils\EntityStatus;

/**
 * Observer that create's the category itself for the Magento 2 EE edition.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-product-ee
 * @link      http://www.techdivision.com
 */
class EeCategoryObserver extends CategoryObserver
{

    /**
     * The trait providing category import functionality.
     *
     * @var \TechDivision\Import\Category\Ee\Observers\EeCategoryObserverTrait
     */
    use EeCategoryObserverTrait;

    /**
     * Initialize the product with the passed attributes and returns an instance.
     *
     * @param array $attr The category attributes
     *
     * @return array The initialized category
     */
    protected function initializeCategory(array $attr)
    {

        // initialize the category attributes
        $attr = parent::initializeCategory($attr);

        // query whether or not, we found a new category
        if (isset($attr[EntityStatus::MEMBER_NAME]) && $attr[EntityStatus::MEMBER_NAME] === EntityStatus::STATUS_CREATE) {
            // if yes, initialize the additional Magento 2 EE category values
            $additionalAttr = array(
                MemberNames::ENTITY_ID  => $this->nextIdentifier(),
                MemberNames::CREATED_IN => 1,
                MemberNames::UPDATED_IN => SqlConstants::MAX_UNIXTIMESTAMP
            );

            // merge and return the attributes
            $attr = array_merge($attr, $additionalAttr);
        }

        // otherwise simply return the attributes
        return $attr;
    }
}
