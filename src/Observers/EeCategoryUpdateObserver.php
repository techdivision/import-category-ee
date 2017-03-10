<?php

/**
 * TechDivision\Import\Category\Ee\Observers\EeCategoryUpdateObserver
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

use TechDivision\Import\Utils\EntityStatus;
use TechDivision\Import\Category\Ee\Utils\MemberNames;
use TechDivision\Import\Category\Observers\CategoryUpdateObserver;

/**
 * Observer that create/update the category itself for the Magento 2 EE edition.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeCategoryUpdateObserver extends CategoryUpdateObserver
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
        if ($attr[EntityStatus::MEMBER_NAME] === EntityStatus::STATUS_CREATE) {
            // if yes, initialize the additional Magento 2 EE category values
            $additionalAttr = array(
                MemberNames::ENTITY_ID  => $this->nextIdentifier(),
                MemberNames::CREATED_IN => 1,
                MemberNames::UPDATED_IN => strtotime('+20 years')
            );

            // merge and return the attributes
            $attr = array_merge($attr, $additionalAttr);
        }

        // otherwise simply return the attributes
        return $attr;
    }

    /**
     * Return's the primary key of the category.
     *
     * @param array $category The category
     *
     * @return integer The primary key
     */
    protected function getPrimaryKey($category)
    {
        return $category[MemberNames::ROW_ID];
    }
}
